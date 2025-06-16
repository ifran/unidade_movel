<?php

namespace App\Repositories;

use App\Models\Usuario;

class UserRepository
{
    public function findByEmailAndPassword(?string $email, ?string $password)
    {
        return Usuario::where("usuario_email", $email)->where("usuario_senha", md5($password))->first();
    }

    public function saveLocalWithUpdatedAt($latitude, $longitude): void
    {
        $user = Usuario::find(session()->get("userId"));
        $user->usuario_lat = $latitude;
        $user->usuario_long = $longitude;
        $user->usuario_updated_at = date("Y-m-d H:i:s");
        $user->save();
    }

    public function getLastUpdatedLocalization()
    {
        return Usuario::select(["unidade.unidade_id", "unidade.unidade_especializacao", "usuario_lat", "usuario_long"])
            ->join("unidade", "unidade.unidade_id", "=", "usuario.unidade_id")
            ->where("usuario_id", "<>", session()->get("userId"))
            ->whereRaw("usuario_updated_at >= NOW() - INTERVAL 30 MINUTE")
            ->where("usuario_localizacao_compartilhada", 1)
            ->get();
    }

    public function saveAdminUser($userInformation): int
    {
        if (session()->get("userId") == null) {
            $user = Usuario::firstOrNew([
                "usuario_email" => $userInformation["email"]
            ]);
        } else {
            $user = Usuario::find(session()->get("userId"));
        }

        $user->empresa_id = $userInformation["companyId"];
        $user->usuario_nome = $userInformation["name"];

        if (!empty($userInformation["password"])) {
            if ($user->usuario_senha !== $userInformation["password"]) {
                $user->usuario_senha = md5($userInformation["password"]);
            }
        }

        $user->usuario_telefone = $userInformation["phone"];
        $user->usuario_cpf = $userInformation["document"];
        $user->usuario_tipo = Usuario::TYPE_ADMIN;

        $user->save();

        return $user->usuario_id;
    }

    public function getUserShareLocationConfiguration()
    {
        return Usuario::find(session()->get("userId"))->usuario_localizacao_compartilhada;
    }

    public function updateLocation($unitId)
    {
        $user = Usuario::find(session()->get("userId"));
        $user->usuario_localizacao_compartilhada = 1;
        $user->unidade_id = $unitId;
        $user->save();
    }

    public function stopUpdateLocation()
    {
        $user = Usuario::find(session()->get("userId"));
        $user->usuario_localizacao_compartilhada = 0;
        $user->unidade_id = null;
        $user->save();
    }

    public function savePatientUser($patientInformation)
    {
        $user = new Usuario();
        $user->usuario_nome = $patientInformation["name"];
        $user->usuario_email = $patientInformation["email"];
        $user->usuario_senha = md5($patientInformation["password"]);
        $user->usuario_telefone = $patientInformation["phone"];
        $user->usuario_cpf = $patientInformation["document"];
        $user->usuario_tipo = Usuario::TYPE_PATIENT;
        $user->save();
    }

    public function getUsersByCompanyId($companyId)
    {
        return Usuario::select([
            "usuario_nome",
            "usuario_email",
            "usuario_cpf",
            "usuario_telefone",
            "unidade_nome",
            "usuario_id"
        ])
            ->leftJoin("unidade", "unidade.unidade_id", "=", "usuario.unidade_id")
            ->where("usuario.empresa_id", $companyId)
            ->get();
    }

    public function getUserInformationById($userId)
    {
        return Usuario::find($userId);
    }

    public function saveChanges($userId, $userInformation)
    {
        $user = $this->getUserInformationById($userId);
        $user->usuario_nome = $userInformation["name"];
        $user->usuario_email = $userInformation["email"];
        $user->usuario_telefone = $userInformation["phone"];
        $user->usuario_cpf = $userInformation["document"];
        $user->save();
    }
}
