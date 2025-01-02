<?php

namespace Tests\Feature\User;

use App\Models\User\User;
use App\Models\Wallet\Wallet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_should_have_an_wallet_after_registering(): void
    {
        // Prepare
        $user = User::factory()->create();

        // Assert
        $this->assertNotNull($user->wallet);
        $this->assertDatabaseHas(Wallet::class, [
            'user_id' => $user->id,
        ]);
    }
}
