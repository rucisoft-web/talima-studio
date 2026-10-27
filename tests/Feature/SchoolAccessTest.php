<?php

namespace Tests\Feature;

use App\Enums\PlatformRole;
use App\Enums\SchoolRole;
use App\Models\School;
use App\Models\User;
use Database\Seeders\PlatformRoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_creator_becomes_school_admin(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/schools', [
            'name' => 'MTs Al-Hikmah',
            'type' => 'mts',
            'npsn' => '12345678',
        ]);

        $school = School::where('name', 'MTs Al-Hikmah')->firstOrFail();
        $response->assertRedirect(route('schools.show', $school));
        $this->assertSame(SchoolRole::Admin, $school->roleOf($user));
        $this->actingAs($user)->get(route('schools.show', $school))->assertOk()->assertSee('MTs Al-Hikmah');
    }

    public function test_school_input_is_validated(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/schools', ['name' => '', 'type' => 'universitas', 'npsn' => '12'])
            ->assertSessionHasErrors(['name', 'type', 'npsn']);
    }

    public function test_non_member_cannot_view_other_school(): void
    {
        $school = School::factory()->create();
        $school->members()->attach(User::factory()->create(), ['role' => SchoolRole::Admin]);

        $this->actingAs(User::factory()->create())
            ->get(route('schools.show', $school))
            ->assertForbidden();
    }

    public function test_dashboard_lists_only_own_schools(): void
    {
        $user = User::factory()->create();
        $mine = School::factory()->create(['name' => 'Sekolah Saya']);
        $mine->members()->attach($user, ['role' => SchoolRole::Teacher]);
        School::factory()->create(['name' => 'Sekolah Orang Lain']);

        $this->actingAs($user)->get('/dashboard')
            ->assertSee('Sekolah Saya')
            ->assertDontSee('Sekolah Orang Lain');
    }

    public function test_teacher_cannot_manage_members_but_admin_can(): void
    {
        $school = School::factory()->create();
        $teacher = User::factory()->create();
        $admin = User::factory()->create();
        $school->members()->attach($teacher, ['role' => SchoolRole::Teacher]);
        $school->members()->attach($admin, ['role' => SchoolRole::Admin]);

        $this->assertFalse($teacher->can('manageMembers', $school));
        $this->assertTrue($admin->can('manageMembers', $school));
    }

    public function test_platform_admin_can_view_any_school(): void
    {
        $this->seed(PlatformRoleSeeder::class);
        $admin = User::factory()->create();
        $admin->assignRole(PlatformRole::PlatformAdmin->value);

        $this->actingAs($admin)
            ->get(route('schools.show', School::factory()->create()))
            ->assertOk();
    }
}
