<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtitulo = 'Lista de Cidades';
        $cidades = Cidade::all();

        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.cidades.store');
        return view('admin.cidades.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
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

        return redirect()->route('admin.cidades.index');
    }

    // Vamos apagar o metodo show pois não vamos utilizar. Devemos fazer uma mudança na rota.
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
     public function show($id)
    {
        //
    }
    */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view('admin.cidades.form', compact('cidade', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        // para quando tem poucos campos
        /*
        $cidade->nome = $request->nome;
        $cidade->save();
        */

        // para quando tem muitos campos
        $cidade->update($request->all());



        $request->session()->flash('sucesso',"Cidade $request->nome alterada com sucesso!");
        return redirect()->route('admin.cidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Cidade::destroy($id);

        $request->session()->flash('sucesso',"Cidade excluida com sucesso!");
        return redirect()->route('admin.cidades.index');
    }
}
