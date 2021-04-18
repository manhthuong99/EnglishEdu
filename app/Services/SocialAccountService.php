<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::where('email',$email)
                ->where('type_login',$social)->first();
            if (!$user) {
                $user = new \App\Models\User();
                $user->email = $email;
                $user->full_name = $providerUser->getName();
                $user->password = bcrypt($providerUser->getId());
                $user->avatar = $providerUser->avatar_original;
                $user->type_login = $social;
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
