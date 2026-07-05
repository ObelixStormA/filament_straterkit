<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('logs a user in and returns a token', function () {
    $user = User::factory()->create(['password' => Hash::make('secret-password')]);

    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'secret-password',
    ]);

    $response->assertOk()
        ->assertJsonPath('data.email', $user->email)
        ->assertJsonStructure(['data', 'token']);
});

it('rejects an invalid login', function () {
    $user = User::factory()->create();

    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'incorrect',
    ]);

    $response->assertUnprocessable();
});

it('returns the authenticated user via /me', function () {
    $user = User::factory()->withRole('admin')->create();

    $response = $this->actingAs($user, 'sanctum')->getJson('/api/v1/me');

    $response->assertOk()->assertJsonPath('data.email', $user->email);
});

it('logs the user out and revokes the current token', function () {
    $user = User::factory()->create();
    $token = $user->createToken('api')->plainTextToken;

    $response = $this->withHeader('Authorization', "Bearer {$token}")
        ->postJson('/api/v1/logout');

    $response->assertOk();
    expect($user->tokens()->count())->toBe(0);
});

it('rejects unauthenticated access to protected endpoints', function () {
    $this->getJson('/api/v1/me')->assertUnauthorized();
});
