@extends('site.layouts.principal')

@section('conteudo-principal')
<section class="section lighten-4 center">
    <div style="display: flex; flex-wrap:wrap; justify-content:space-around">
        @foreach ($cidades as $cidade)
            <a href="{{ route('cidades.imoveis.index', $cidade->id) }}" style="margin-bottom:2%;">
                <div class="card-panel" style="width:280px; height:100%; margin-bottom:2%;">
                    <i class="material-icons medium green-text text-lighten-3">room</i>
                    <h4 class="black-text">{{$cidade->nome}}</h4>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection

@section('slider')
    <section class="slider">
        <ul class="slides">
            <li>
                <img src="https://source.unsplash.com/ZQD9cWknXf8/1900x600"/>
                <div class="caption center-align">
                    <h2 style="text-shadow: 2px 2px 8px #1b5e20;">
                        Encontre os melhores imóveis da cidade!
                    </h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/B0aCvAVSX8E/1900x600"/>
                <div class="caption left-align">
                    <h2 style="text-shadow: 2px 2px 8px #1b5e20;">Melhores imóveis para aluguel!</h2>
                </div>
            </li>
            <li>
                <img src="https://source.unsplash.com/BQRLk8LCQ5w/1900x600"/>
                <div class="caption right-align">
                    <h2 style="text-shadow: 2px 2px 8px #1b5e20;">Melhores imóveis para venda!</h2>
                </div>
            </li>
        </ul>
    </section>
@endsection
