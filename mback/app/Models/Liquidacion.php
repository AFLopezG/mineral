<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model
{
    use HasFactory;
    protected $fillable=[
        'mineral',
        'codigo',
        'tipo',
        "peso",
        "saco",
        'liquidado',
        'conjunto',
        'cliente_id',
        'cooperativa_id',
        'fecha'
     ];
     protected $hidden = ["created_at", "updated_at"];

     public function cliente(){
         return $this->belongsTo(Cliente::class);
     }
     public function cooperativa(){
         return $this->belongsTo(Cooperativa::class);
     }
     public function ley(){
        return $this->belongsTo(Ley::class,'id');
    }

    public function diaria(){
        return $this->hasOne(Diaria::class);
    }
    public function quincena(){
        return $this->hasOne(Quincena::class);
    }

}
