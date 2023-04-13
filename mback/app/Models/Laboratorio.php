<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $fillable=[
        'plata',
        'plomo',
        'zinc',
        'estano',
        'agua',
        
    
        'clplata',
        'clplomo',
        'clzinc',
        'clestano',
        'clagua',
    
        'finplata',
        'finplomo',
        'finzinc',
        'finestano',
        'finagua',
    
        'lote_id'
     ];
     protected $hidden = ["created_at", "updated_at"];

     public function cooperativa(){
         return $this->belongsTo(Cooperativa::class);
     }

}
