<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";
    protected $primaryKey = "agenda_id";
    public $timestamps = false;

    protected $fillable = [
        "agenda_id",
        "unidade_id",
        "agenda_data_ini",
        "agenda_data_fim",
        "agenda_hora_ini",
        "agenda_hora_fim",
        "agenda_lat",
        "agenda_long",
        "agenda_endereco",
        "agenda_cidade",
        "agenda_bairro",
        "agenda_estado",
    ];
}
