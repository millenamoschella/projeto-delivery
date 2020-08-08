<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Tag;
use Illuminate\Support\Facades\DB;


class EmpresaController extends Controller
{
    public function index(Request $request)
    {

        $tags = Tag::all();

        $filtros = $request->get('filtros');  //pegando as tags do formulário

        // boa prática não usar condicionais dentro do controller, mas sim no model.
        // chamar a função criada no model Empresa.php, para usar uma função direto com controller precisa primeiro instanciar, usando "statica" na public function no model, chmanado o método filtros e a variável filtros

        $empresas = Empresa::filtros($filtros);


        return view('empresas.index', compact('tags', 'empresas'));

        //outra opção além do compact
        // return view('empresas.index')->with('tags', $tags);
    }
}
