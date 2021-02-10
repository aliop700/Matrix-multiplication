<?php

namespace App\Actions;

use App\Exceptions\InvalidCredentialsException;
use App\User;
use Illuminate\Support\Facades\Auth;

class GetTokenAction
{
    /**
     *
     * Create Token and returns it
     *
     * @param string email
     * @param string password
     *
     * @return string token
     *
     */

    public function __invoke(string $email, string $password): string
    {
        $credentials = compact('email', 'password');

        if (!Auth::Attempt($credentials)) {
            throw new InvalidCredentialsException('credentials are invalid');
        }

        $user = User::where('email', $email)->first();

        $token = $user->createToken('authToken')->plainTextToken;

        return $token;
    }
}
