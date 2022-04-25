@extends('admin.layouts.principal')

@section('conteudo-principal')
<h4>{{$imovel->titulo}}</h4>

<section class="section">

    <div class="flex-container">
        @forelse ($fotos as $foto)

            <div class="flex-item">
                <span class="btn-fechar">

                    {{-- Remover --}}
                    <form action="{{ route('admin.imoveis.fotos.destroy', [$imovel->id, $foto->id]) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit" style="border: 0;background:transparent;" title="remover">
                            <span style="cursor:pointer">
                                <i class="material-icons red-text text-accent-3">delete_forever</i>
                            </span>
                        </button>
                    </form>

                </span>
                <img src="{{asset("storage/$foto->url")}}" width="150" height="100"/>
            </div>

        @empty
            <div>Não existem fotos para este imóvel.</div>
        @endforelse
    </div>

    <div class="fixed-action-btn">
        <a href="{{ route('admin.imoveis.fotos.create', $imovel->id) }}" class="btn-floating btn-large waves-effect waves-light">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>
@endsection
