<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cidade;

class CidadeController extends Controller
{
    public function cidades()
    {

        $subtitulo = 'Lista de Cidades';

        //$cidades = ['Recife', 'Belo Horizonte'];

        $cidades = Cidade::all();

       return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(Request $request)
    {
        //Criar uma objeto do modelo Cidade e atribuindo atributos individualmente
        /*
        $cidade = new Cidade();
        $cidade->nome = $request->nome;


        $cidade->save(); // salvar no BD
        */

        //Criar objeto e fazer atribuição em massa Mass Assignment e já salva no banco de dados

        Cidade::create($request->all());


        return redirect()->route('admin.cidades.listar');
    }
}
