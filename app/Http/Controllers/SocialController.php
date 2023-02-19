<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $facebook = Socialite::driver('facebook')->user();

        if(!$facebook->email){
            return Socialite::driver('facebook')->reRequest()->redirect();
        }

        $user = User::firstOrCreate(
            ['email' => $facebook->email],
            [
                'name' =>  $facebook->name,
                'password' => Hash::make($facebook->name . '@' . $facebook->id)
            ]
        );
        Auth::login($user);
        return redirect()->route('home');
    }

}
