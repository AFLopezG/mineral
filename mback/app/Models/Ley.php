<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ley extends Model
{
    use HasFactory;
    protected $fillable=[
        'lote_id',
        'plomo',
        'plata',
        'zinc',
        'estaño',
        'humedad'
     ];
     protected $hidden = ["created_at", "updated_at"];

     public function lote(){
         return $this->belongsTo(Lote::class);
     }
     

}
