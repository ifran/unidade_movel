<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuario";
    protected $primaryKey = "usuario_id";

    public $timestamps = false;

    protected $fillable = [
        "usuario_id",
        "empresa_id",
        "unidade_id",
        "usuario_nome",
        "usuario_email",
        "usuario_senha",
        "usuario_telefone",
        "usuario_cpf",
        "usuario_tipo",
        "usuario_localizacao_compartilhada",
        "usuario_lat",
        "usuario_long",
        "usuario_updated_at"
    ];

    const TYPE_ADMIN = 1;
    const TYPE_PATIENT = 2;
}
