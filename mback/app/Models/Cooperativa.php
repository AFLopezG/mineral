<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    use HasFactory;
    protected $fillable=[
       'nombre',
       'direccion',
       'representante',
       'nim',
       'nit',
       'celular',
       'estado'
       //'fecha'
       //'cliente',
       //'cliente_id',
    ];
    //protected $hidden = ["created_at", "updated_at"];
   
    public function cliente(){
        return $this->hasMany(Cliente::class);
    }
    public function descuento(){
        return $this->hasMany(Descuento::class);
    }
}
