<?php

namespace App\Models;

use App\Enums\SchoolRole;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SchoolMember extends Pivot
{
    protected $table = 'school_members';

    public $incrementing = true;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => SchoolRole::class,
        ];
    }
}
