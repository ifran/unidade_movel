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
            ->get();
    }

    public function saveAdminUser($userInformation): int
    {
        $user = Usuario::firstOrNew([
            "usuario_email" => $userInformation["email"]
        ]);

        $user->empresa_id = $userInformation["companyId"];
        $user->usuario_nome = $userInformation["name"];
        $user->usuario_senha = $userInformation["password"];
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
}
