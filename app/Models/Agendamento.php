<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "agendamento";
    protected $primaryKey = "agendamento_id";
    public $timestamps = false;

    protected $fillable = [
        "agendamento_id",
        "usuario_id",
        "unidade_id",
        "data",
        "hora",
        "status",
    ];

    const WAITING = 1;
}
