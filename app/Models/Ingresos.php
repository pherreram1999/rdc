<?php

namespace App\Models;

use Database\Factories\IngresosFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function newFactory()
    {
        return IngresosFactory::new();
    }
}
