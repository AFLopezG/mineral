<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable=[
        'pesobruto',
        'saco',
        'tara',
        'pesohumedo',
        'fecha',
        'cliente_id'
     ];
     protected $hidden = ["created_at", "updated_at"];

     public function cliente(){
         return $this->belongsTo(Cliente::class);
     }

   
}
