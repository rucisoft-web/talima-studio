<?php

namespace Tests\Unit;

use App\Enums\SchoolRole;
use PHPUnit\Framework\TestCase;

class SchoolRoleTest extends TestCase
{
    public function test_only_admin_can_manage_members(): void
    {
        $this->assertTrue(SchoolRole::Admin->canManageMembers());
        $this->assertFalse(SchoolRole::Teacher->canManageMembers());
    }
}
