<?php

namespace Database\Seeders;

use App\Enums\PlatformRole;
use App\Enums\SchoolRole;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PlatformRoleSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin TALIMA',
            'email' => 'admin@talima.test',
        ]);
        $admin->assignRole(PlatformRole::PlatformAdmin->value);

        $guru = User::factory()->create([
            'name' => 'Guru Contoh',
            'email' => 'guru@talima.test',
        ]);

        School::factory()->create(['name' => 'SMP Contoh TALIMA'])
            ->members()->attach($guru, ['role' => SchoolRole::Admin]);
    }
}
