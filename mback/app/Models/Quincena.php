<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quincena extends Model
{
    use HasFactory;
    protected $fillable=[
        'plata', 
        'plomo', 
        'zinc', 
        'estano', 
        'alplata', 
        'alplomo', 
        'alzinc', 
        'alestano', 
        'fecha'
     ];
     protected $hidden = ["created_at", "updated_at"];

}
