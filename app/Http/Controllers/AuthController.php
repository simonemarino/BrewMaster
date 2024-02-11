<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\AuthHandle;
use Illuminate\Support\Str;
use App\Models\User;



class AuthController extends Controller
{
    use AuthHandle;

    public function login(UserLoginRequest $request)
    {
        // Verify Crendential
         if(!$this->verifyCredential($request)) return redirect()->route('welcome')->withErrors(['errors' => 'Invalid email or password!']);
         //Saving AccessToken User
         if(!$this->saveAccessToken($request)) return redirect()->route('welcome')->withErrors(['errors' => 'User not found!']);

        return redirect(route('beers.index'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('welcome'));
    }





}
