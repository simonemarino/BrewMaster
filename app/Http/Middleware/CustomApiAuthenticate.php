<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class CustomApiAuthenticate extends Middleware
{

     /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guards): Response
    {
        if (!$this->isAuth($request)) {
            return response()->json(['message'=> 'Unauthorized'],401);
        }

        return $next($request);
    }
    private function isAuth(Request $request): bool
    {
        $bearerToken = $request->bearerToken();
        $user = User::where('access_token',$bearerToken)->first();

        if ($user && $request->bearerToken()) {
            return true;
        }

        return false;
    }
}
