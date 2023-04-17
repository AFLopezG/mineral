<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable=[
                 
        'nombre',
        'ci',
        'telefono',
        'celular',
        'activo',
        'fecha',
        'cooperativa_id',
     ];
   //protected $hidden = ["created_at", "updated_at"];

    public function cooperativa(){
      return $this->belongsTo(Cooperativa::class);
    }
}
