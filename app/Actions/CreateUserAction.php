<?php

namespace App\Actions;

use App\User;

class CreateUserAction
{
    /**
     * Creates User Record
     *
     * @param array $data
     *
     * @return User
     *
     */

    public function __invoke(array $data): User
    {
        $email = $data['email'];
        $name = $data['name'];
        $password = $data['password'];

        $user = new User();

        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        $user->save();

        return $user;
    }
}
