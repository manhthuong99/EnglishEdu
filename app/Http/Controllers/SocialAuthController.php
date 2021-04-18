<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    const STATUS_ENABLE = 1;
    const USER_PERMISSION = 1;

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
                $loginInfo = [
                    'email' => $user->email,
                    'password' => $providerUser->getId(),
                    'type_login' => $social,
                    'permission' => self::USER_PERMISSION,
                    'status' => self::STATUS_ENABLE
                ];
                if (Auth::attempt($loginInfo)) {
                    return redirect('/');
                } else {
                    return redirect(route('user.login'))->with('message', 'Đăng nhập thất bại!');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Đăng nhập thất bại!');
        }
    }
}
