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
        //relacionamento N - N
        // return $this->belongsToMany('App\Tag');
        return $this->belongsToMany(Tag::class);
    }



    // FILTRAR AS EMPRESAS QUE TEM TAGS

    // Colocando a regra de negócio dentro do model
    // se os filtros forem nulos retorna todas as empresas
    public static function filtros($filtros)
    {
        if ($filtros === null) {
            return Empresa::all();
        }
        // fazer o filtro e devolver a collection, lista de empresas filtradas
        return Empresa::whereHas('tags', function ($query) use ($filtros) {
            $query->whereIn('id', $filtros);
        })->get();

        //usa whereHas - quero filtrar a empresa que tenha a tag específica, tem que ter as tags com as condicionais usadas com o whereIn, onde o id está num conjunto de ids que o usuário passou no formulário, use ($filtros) é para poder ter acesso externo a varável $filtros. Se eu quisesse trazer todas as empresas que tem tags eu poderia usar somente has no lugar de wherehas
    }
}
