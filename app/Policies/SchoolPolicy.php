<?php

namespace App\Policies;

use App\Models\School;
use App\Models\User;

/**
 * Admin platform sudah diizinkan lebih dulu lewat Gate::before di AppServiceProvider.
 */
class SchoolPolicy
{
    public function view(User $user, School $school): bool
    {
        return $user->belongsToSchool($school);
    }

    public function update(User $user, School $school): bool
    {
        return $school->roleOf($user)?->canManageMembers() ?? false;
    }

    public function manageMembers(User $user, School $school): bool
    {
        return $this->update($user, $school);
    }

    public function delete(User $user, School $school): bool
    {
        return false;
    }
}
