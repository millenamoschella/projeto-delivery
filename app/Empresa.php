<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;


class Empresa extends Model
{
    protected $fillable = [
        'nome', 
        'endereco', 
        'descricao', 
        'coordenadas'
    ];

    public function tags()
    {
        // return $this->belongsToMany('App\Tag');
        return $this->belongsToMany(Tag::class);
    }
}

