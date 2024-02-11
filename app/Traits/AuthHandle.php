<?php
namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use App\Models\User;

trait AuthHandle
{
  public function verifyCredential($request ) {
        $credentials = $request->only('email', 'password');
    return Auth::attempt($credentials);
  }
  public function saveAccessToken($request ) {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->access_token = Str::random(60);
            $user->save();
            return true;
        }
        return false;
   }


}
