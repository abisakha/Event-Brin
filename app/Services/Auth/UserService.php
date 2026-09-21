<?php

namespace App\Services\Auth;

use App\Models\Satker;
use App\Models\User;

class UserService
{
    public function updateOrCreateSatker(array $ssoUser): Satker
    {
        $satkerId = $ssoUser['pegawaiData']['administrative_unit_id'];

        return Satker::updateOrCreate(
            [
                'id' => $satkerId,
            ],
            [
                'unit_name' => $ssoUser['pegawaiData']['administrative_name'],

                'status' => true,
            ]
        );
    }

    public function updateOrCreateUser(array $ssoUser): User
    {
        $usernameIntra = $ssoUser['userData']['username'] ?? null;
        $email = $ssoUser['userData']['email'] ?? null;

        $satker = $this->updateOrCreateSatker($ssoUser);

        $data = [
            'password' => '*',
            'satker_id' => $satker->id,
            'satker_name' => $satker->unit_name,

            'user_type' => null,

            'name' => $ssoUser['pegawaiData']['name'],
            'email' => $email,

            'status' => (bool) (
                $ssoUser['userData']['active'] ?? false
            ),
        ];

        if (!empty($usernameIntra)) {
            return User::updateOrCreate(
                [
                    'username_intra' => $usernameIntra,
                ],
                [
                    ...$data,
                    'username_intra' => $usernameIntra,
                ]
            );
        }

        return User::updateOrCreate(
            [
                'email' => $email,
            ],
            $data
        );
    }
}