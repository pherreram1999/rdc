<?php

namespace App\Models;

use Database\Factories\DeudaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deudas extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    public function tipoAdeudo()
    {
        return $this->belongsTo(TipoAdeudo::class, 'tipo_adeudo_id');
    }


    public static function newFactory()
    {
        return new DeudaFactory();
    }
}
