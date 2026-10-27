<?php

namespace App\Enums;

/**
 * Peran tingkat platform sesuai spesifikasi bagian 3.
 * Guru, kreator, dan pembeli adalah kemampuan akun biasa, bukan peran terpisah.
 */
enum PlatformRole: string
{
    case Moderator = 'moderator';
    case PlatformAdmin = 'platform-admin';
    case Support = 'support';
}
