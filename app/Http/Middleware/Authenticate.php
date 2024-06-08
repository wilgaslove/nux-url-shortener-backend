<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class Authenticate extends Middleware
{
    // /**
    //  * Get the path the user should be redirected to when they are not authenticated.
    //  */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }

    public function register(Request $request) {
        $credentials = $request->validate([
            'name'=>['required', 'string', 'max:25'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'email'=>['required', 'string', 'confirmed', Password::default()],
            
        ]);
        return User::create([
            'name' => $request->name,
            'email' => $request->name
        ]);
    }
}
