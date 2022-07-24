<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaria extends Model
{
    use HasFactory;
    protected $fillable=[
        'plata',
        'plomo',
        'zinc',
        'estano',
        'fecha'
     ];
     protected $hidden = ["created_at", "updated_at"];



}
