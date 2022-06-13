<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critico extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        "firstName",
        "lastName",
        "totalCriticas",
        "descripcion",
        "foto",
        "userID"
    ];
}
