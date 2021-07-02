<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Auth\SignInRequest;
use App\Http\Requests\Client\Auth\SignUpRequest;
use App\Models\Client\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class AuthController extends Controller
{
    private $users = null;

    /**
     * AuthController constructor.
     * @param User $users
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function SignUp(SignUpRequest $request)
    {

        $userData = $request->validated();
        $userData['username'] = $this->users->getUserName($userData['first_name'] . ' ' . $userData['last_name']);
        $userData['name'] = $userData['first_name'] . ' ' . $userData['last_name'];
        $userData['user_scope'] = 'user';
        $addedUser = $this->users->createData($userData);
        if (empty($userData))
            return back();
        $this->users->loginUser(['email' => $addedUser['email'], 'password' => $userData['password']]);
        return redirect('/');
    }

    public function signIn(SignInRequest $request)
    {
        $userData = $request->validated();
        $signedUser = $this->users->loginUser($userData);
        return (empty($signedUser)) ? back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])
            : redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
