@extends('admin.layouts.principal')

@section('conteudo-principal')

<section class="section">
    <!-- Apresentar os erro no inicio do form-->
    @if ($errors->any())
        <div class="red-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.cidades.adicionar') }}" method="POST">
        @csrf
        <div class="input-field">
            <input type="text" name="nome" id="nome" value="{{old('nome')}}"/>
            <label for="nome">Nome</label>
            @error('nome')
                <span class="red-text text-accent-3"><small>{{$message}}</small></span>
            @enderror
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
