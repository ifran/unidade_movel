<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $primaryKey = "empresa_id";
    public $timestamps = false;

    protected $fillable = [
        "empresa_id",
        "empresa_cnpj",
        "empresa_razao_social",
        "empresa_nome_fantasia",
        "empresa_endereco",
    ];
}
