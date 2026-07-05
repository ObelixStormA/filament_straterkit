<?php

declare(strict_types=1);

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

pest()->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->beforeEach(fn () => $this->seed(RolePermissionSeeder::class))
    ->in('Feature', 'Unit');

function superAdmin(): User
{
    return User::factory()->withRole('super-admin')->create();
}

function adminUser(): User
{
    return User::factory()->withRole('admin')->create();
}
