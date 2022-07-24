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
    ];
    protected $hidden = ["created_at", "updated_at"];

}
