@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <form action="{{ route('admin.cidades.adicionar') }}" method="POST">
        @csrf
        <div class="input-field">
            <input type="text" name="nome" id="nome" />
            <label for="nome">Nome</label>
        </div>
        <div class="right-align">
            <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
            <button type="submit" class="btn waves-effect waves-light">
                Salvar
            </button>
        </div>
    </form>
</section>
@endsection
