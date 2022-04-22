<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelRequest;
use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\Proximidade;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulta padrão lazy load
        //$imoveis = Imovel::all();

        //Consulta eager load -> otimizada para busca com tabelas relacionamentos, ordenando pelo titulo da tabela Imovel

        $imoveis = Imovel::with(['cidade', 'endereco'])
        ->orderBy('titulo', 'asc')
        ->get();


        //Consulta eager load - querybuilder -> otimizada para busca com tabelas relacionamentos, ordenando pelo campo de outra tabela relacionada

        /* Desta forma deu problema no bairro
        $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
            ->orderBy('cidades.nome', 'asc')
            ->orderBy('enderecos.bairro', 'asc')
            ->orderBy('titulo', 'asc')
            ->get();
        */



        return view('admin.imoveis.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        $action = route('admin.imoveis.store');
        return view('admin.imoveis.form', compact('action', 'cidades','tipos', 'finalidades', 'proximidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImovelRequest $request)
    {
        DB::beginTransaction(); // quando necessario fazer duas ou mais tarefas no bd que estao realacionadas colocamos dentro de uma transação assim garantimos que vai funcionar

        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if($request->has('proximidades')){

            $imovel->proximidades()->sync($request->proximidades);// sincroniza fazendo o attach e detach ao mesmo tempo

            // attach - cria a associação
            //$imovel->proximidades()->attach($request->proximidades); - so adiciona
            // detach - desfaz a  associação
            //$imovel->proximidades()->detach($request->proximidades);
        }

        DB::Commit();

        $request->session()->flash('sucesso',"Imovel incluído com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);

        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        $action = route('admin.imoveis.update', $imovel->id);
        return view('admin.imoveis.form', compact('imovel', 'action', 'cidades','tipos', 'finalidades', 'proximidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImovelRequest $request, $id)
    {
        $imovel = Imovel::find($id);

        DB::beginTransaction();

        $imovel->update($request->all());
        $imovel->endereco->update($request->all());

        if($request->has('proximidades')){
            $imovel->proximidades()->sync($request->proximidades);
        }

        DB::Commit();

        $request->session()->flash('sucesso',"Imovel atualizado com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imovel = Imovel::find($id);

        // por ser duas transaçoes vamos colocar num transation
        DB::beginTransaction();

        //remover endereço
        $imovel->endereco->delete();

        //Remover o imovel
        $imovel->delete();

        DB::Commit();

        $request->session()->flash('sucesso',"Imovel excluído com sucesso!");
        return redirect()->route('admin.imoveis.index');


    }
}
