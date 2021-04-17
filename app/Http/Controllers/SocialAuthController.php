<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        try {
            $providerUser = Socialite::driver($social)->user();
            $user = SocialAccountService::createOrGetUser($providerUser, $social);
            if ($user) {
                Auth::attempt(
                    [
                        'email' => $user->email,
                        'password' => $providerUser->getId(),
                        'permission' => $user->permission,
                        'status' => $user->status
                    ]
                );
                return redirect('/');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Đăng nhập thất bại!');
        }
    }
}
