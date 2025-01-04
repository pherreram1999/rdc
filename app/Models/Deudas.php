<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deudas extends Model
{
    protected $guarded = ['id'];

    public function tipoAdeudo()
    {
        return $this->belongsTo(TipoAdeudo::class, 'tipo_adeudo_id');
    }
}
