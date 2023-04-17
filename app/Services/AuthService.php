<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserInformation;
use Laravel\Socialite\Contracts\User as SocialUser;

class AuthService
{
    public function getInternalUser(SocialUser $socialUser, string $provider)
    {
        $socialId = $socialUser->getEmail();
        $user = User::query()->where('social_id', $socialId)->first();

        if (!$user) {
            $user = User::query()->create([
                'name' => $socialUser->getName(),
                'social_id' => $socialUser->getId(),
                'provider' => $provider,
            ]);
        }

        return $user;
    }

    public function googleUpdateAdditionalUserInformation(SocialUser $googleUser, User $user): void
    {
        $avatar = $googleUser->getAvatar();
        $firstName = $googleUser->user['given_name'] ?? null;
        $lastName = $googleUser->user['family_name'] ?? null;

        $this->updateAdditionalInformationFromSocial($user, $avatar, $firstName, $lastName);
    }

    public function githubUpdateAdditionalUserInformation(SocialUser $githubUser, User $user): void
    {
        $this->updateAdditionalInformationFromSocial(user: $user, avatar: $githubUser->getAvatar());
    }

    private function updateAdditionalInformationFromSocial(User $user, ?string $avatar = null, ?string $firstName = null, ?string $lastName = null)
    {
        $userInformation = $user->information;

        if (!$userInformation) {
            UserInformation::query()->create([
                'user_id' => $user->id,
                'image' => $avatar,
                'first_name' => $firstName,
                'last_name' => $lastName,
            ]);
        } else {
            $userInformation->image = $avatar;
            $userInformation->first_name = $firstName;
            $userInformation->last_name = $lastName;
            $userInformation->save();
        }
    }
}
