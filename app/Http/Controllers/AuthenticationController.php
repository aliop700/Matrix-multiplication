<?php

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Actions\GetTokenAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{

    /**
     *
     * register new user
     *
     * @param RegisterRequest $request
     *
     * @return Illuminate\Support\Facades\Response
     *
     */

    public function register(RegisterRequest $request)
    {

        $data = $request->all();

        $user = (new CreateUserAction())($data);

        return response()->success($user, 201);

    }

    /**
     *
     * Authenticate user
     *
     * @param LoginRequest $request
     *
     * @return Illuminate\Support\Facades\Response
     *
     */

    public function login(LoginRequest $request)
    {

        $data = $request->all();

        $email = $data['email'];

        $password = $data['password'];

        $token = (new GetTokenAction())($email, $password);

        return response()->success(['token' => $token], 200);

    }
}
