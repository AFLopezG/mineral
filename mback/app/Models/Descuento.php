<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'porcentaje',
        'fijo',
        'activo',
        'cooperativa_id'
     ];
     protected $hidden = ["created_at", "updated_at"];

     public function cooperativa(){
         return $this->belongsTo(Cooperativa::class);
     }
     
}
