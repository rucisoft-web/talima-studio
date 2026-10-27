<?php

namespace Database\Seeders;

use App\Enums\PlatformRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PlatformRoleSeeder extends Seeder
{
    /**
     * Buat peran tingkat platform (moderator, admin platform, support).
     */
    public function run(): void
    {
        foreach (PlatformRole::cases() as $role) {
            Role::findOrCreate($role->value, 'web');
        }
    }
}
