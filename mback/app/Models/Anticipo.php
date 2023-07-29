<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anticipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'lote_id',
        'monto',
        'fecha',
        'nombreChofer',
        'ciChofer',
        'placa',
        'tipoVehiculo',
        'descripcion',
    ];
    public function lote(){
        return $this->belongsTo(Lote::class);
    }
}
