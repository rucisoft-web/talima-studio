<?php

namespace App\Models;

use App\Enums\SchoolRole;
use App\Enums\SchoolType;
use Database\Factories\SchoolFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name', 'slug', 'type', 'npsn', 'city', 'province'])]
class School extends Model
{
    /** @use HasFactory<SchoolFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => SchoolType::class,
        ];
    }

    /**
     * @return BelongsToMany<User, $this>
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'school_members')
            ->using(SchoolMember::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function roleOf(User $user): ?SchoolRole
    {
        $member = $this->members()->whereKey($user->getKey())->first();

        return $member?->pivot->role;
    }
}
