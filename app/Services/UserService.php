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
            session()->put("unitId", $userRepository->unidade_id);
            session()->put("companyId", $userRepository->empresa_id);
            session()->put("userType", $userRepository->usuario_tipo);
            session()->put("shareLocation", $userRepository->usuario_localizacao_compartilhada);

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

    public function saveUser($userInformation)
    {
        $userRepository = new UserRepository();
        $userRepository->savePatientUser($userInformation);
    }

    public function saveAdminUser($userInformation)
    {
        $userInformation["companyId"] = session()->get("companyId");
        $userRepository = new UserRepository();
        $userRepository->saveAdminUser($userInformation);
    }

    public function getAllOnlineLocalization(): array
    {
        $localizations = (new UserRepository())->getLastUpdatedLocalization();

        $all = [];
        $i = 0;
        foreach ($localizations as $localization) {
            $all[$i]["unitId"] = $localization->unidade_id;
            $all[$i]["latitude"] = $localization->usuario_lat;
            $all[$i]["longitude"] = $localization->usuario_long;
            $all[$i]["description"] = $localization->unidade_especializacao ?? $localization->unidade_nome;
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
        $userInformation["password"] = $userAndCompanyInformation["password"];
        $userInformation["phone"] = $userAndCompanyInformation["phone"];
        $userInformation["document"] = onlyLettersAndNumbers($userAndCompanyInformation["document"]);
        $userInformation["companyId"] = $companyId;

        $userRepository = new UserRepository();
        $userRepository->saveAdminUser($userInformation);

        return true;
    }

    public function shareLocationByUnitId($unitId)
    {
        $userRepository = new UserRepository();
        $userRepository->updateLocation($unitId);

        session()->put("unitId", $unitId);
        session()->put("shareLocation", 1);
    }

    public function stopSharingLocation()
    {
        $userRepository = new UserRepository();
        $userRepository->stopUpdateLocation();

        session()->put("unitId", null);
        session()->put("shareLocation", 0);
    }

    public function getAllUserByCompanyId()
    {
        $userRepository = new UserRepository();
        return $userRepository->getUsersByCompanyId(session()->get("companyId"));
    }

    public function getUserInformationByUserId($userId)
    {
        $userRepository = new UserRepository();
        return $userRepository->getUserInformationById($userId);
    }

    public function saveChanges($userId, $userInformation)
    {
        $userRepository = new UserRepository();
        $userRepository->saveChanges($userId, $userInformation);
    }
}
