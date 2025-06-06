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
        return Usuario::select(["unidade.unidade_especializacao", "usuario_lat", "usuario_long"])
            ->leftJoin("unidade", "unidade.unidade_id", "=", "usuario.unidade_id")
            ->where("usuario_id", "<>", session()->get("userId"))
            ->get();
    }

    public function saveUser($userInformation): int
    {
        $user = Usuario::firstOrNew([
            "usuario_email" => $userInformation["email"]
        ]);

        $user->empresa_id = $userInformation["companyId"];
        $user->usuario_nome=  $userInformation["name"];
        $user->usuario_senha = $userInformation["password"];
        $user->usuario_telefone = $userInformation["phone"];
        $user->usuario_cpf = $userInformation["document"];
        $user->usuario_tipo = Usuario::TYPE_ADMIN;

        $user->save();

        return $user->usuario_id;
    }
}
