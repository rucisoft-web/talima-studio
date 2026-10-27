<?php

namespace App\Enums;

/**
 * Peran pengguna di dalam satu institusi. Peran tingkat platform
 * (moderator, admin platform, support) dikelola lewat spatie/laravel-permission.
 */
enum SchoolRole: string
{
    case Admin = 'admin';
    case Teacher = 'teacher';

    public function canManageMembers(): bool
    {
        return $this === self::Admin;
    }
}
