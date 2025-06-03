<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function makeLogin(?string $email, ?string $password): bool
    {
        $userRepository = (new UserRepository())->findByEmailAndPassword($email, $password);

        if ($userRepository !== null) {
            session()->put("userId", $userRepository->usuario_id);

            return true;
        }

        return false;
    }

    public function saveLocal(?string $latitude, ?string $longitude): void
    {
        (new UserRepository())->saveLocalWithUpdatedAt($latitude, $longitude);
    }

    public function getAllOnlineLocalization(): array
    {
        $localizations = (new UserRepository())->getLastUpdatedLocalization();

        $all = [];
        $i = 0;
        foreach ($localizations as $localization) {
            $all[$i]["latitude"] = $localization->usuario_lat;
            $all[$i]["longitude"] = $localization->usuario_long;
            $all[$i]["description"] = $localization->unidade_especeliazacao;
            $i++;
        }

        return $all;
    }
}
