<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::calss);
    }

    protected $fillable = [
        'titulo',
        'ano_publicacao',
        'numero_paginas',
        'genero',
        'author_id',
    ];

}
