<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post Extends Model
{

    protected $fillable = [
        'titulopost',
        'conteudopost',
        'autorpost',
        'data_criacaopost',
        'imagempost',
    ];
}