<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function cidades()
    {

        $subtitulo = 'Lista de Cidades';

        $cidades = ['Recife', 'Belo Horizonte'];

        return view('admin.cidades.index',compact('subtitulo', 'cidades'));
    }
}
