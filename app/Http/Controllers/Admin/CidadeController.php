<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;

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

    public function adicionar(CidadeRequest $request)
    {
        // Validação de dados: Antes de Salvar verificar
        // Para casos em que não possui muitos campos
        /*$request->validate([
            'nome' => 'bail|required|min:3|max:100|unique:cidades',
        ]);*/

        //Sempre procure colocar a logica de validação fora do controlador
        // criando um Form Request:   php artisan make:request CidadeRequest


        //Criar uma objeto do modelo Cidade e atribuindo atributos individualmente
        /*
        $cidade = new Cidade();
        $cidade->nome = $request->nome;


        $cidade->save(); // salvar no BD
        */

        //Criar objeto e fazer atribuição em massa Mass Assignment e já salva no banco de dados

        Cidade::create($request->all());

        $request->session()->flash('sucesso',"Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }
}
