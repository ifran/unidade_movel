<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $table = "unidade";
    protected $primaryKey = "unidade_id";

    public $timestamps = false;

    protected $fillable = [
        "unidade_id",
        "empresa_id",
        "unidade_nome",
        "unidade_endereco",
        "unidade_status",
        "unidade_especializacao",
        "unidade_placa",
    ];
}
