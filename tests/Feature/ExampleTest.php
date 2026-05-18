<?php
use App\Models\User;

it('returns 200 when authenticated', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/')->assertOk();
});
