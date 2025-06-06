<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;

class UserService
{
    public function makeLogin(?string $email, ?string $password): bool
    {
        $userRepository = (new UserRepository())->findByEmailAndPassword($email, $password);

        if ($userRepository !== null) {
            session()->put("userId", $userRepository->usuario_id);
            session()->put("companyId", $userRepository->empresa_id);

            return true;
        }

        return false;
    }

    public function saveLocal(?string $latitude, ?string $longitude): void
    {
        $userRepository = new UserRepository();

        $isUserSharingLocation = $userRepository->getUserShareLocationConfiguration();
        if ($isUserSharingLocation) {
            $userRepository->saveLocalWithUpdatedAt($latitude, $longitude);
        }
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

    public function saveUserInformationRelatingWithCompany($userAndCompanyInformation): bool
    {
        $companyInformation["companyDocument"] = onlyLettersAndNumbers($userAndCompanyInformation["companyDocument"]);
        $companyInformation["companyName"] = $userAndCompanyInformation["companyName"];
        $companyInformation["companyNameSecondary"] = $userAndCompanyInformation["companyNameSecondary"];
        $companyInformation["address"] = $userAndCompanyInformation["address"];

        $companyRepository = new CompanyRepository();
        $companyId = $companyRepository->saveCompany($companyInformation);

        $userInformation["name"] = $userAndCompanyInformation["name"];
        $userInformation["email"] = $userAndCompanyInformation["email"];
        $userInformation["password"] = md5($userAndCompanyInformation["password"]);
        $userInformation["phone"] = $userAndCompanyInformation["phone"];
        $userInformation["document"] = onlyLettersAndNumbers($userAndCompanyInformation["document"]);
        $userInformation["companyId"] = $companyId;

        $userRepository = new UserRepository();
        $userRepository->saveUser($userInformation);

        return true;
    }
}
