<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termino extends Model
{
    use HasFactory;
    protected $fillable = [
    'nombre',   
    'plataPagable',
    'plomoPagable',
    'zincPagable',
    'refino',
    'maquila',
    'transporte',
    'base',
    
    ];
    protected $hidden = ["created_at", "updated_at"];
}
