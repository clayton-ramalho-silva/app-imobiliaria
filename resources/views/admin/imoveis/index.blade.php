@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->cidade->nome }}</td>
                        <td>{{ $imovel->endereco->bairro }}</td>
                        <td>{{ $imovel->titulo}}</td>
                        <td>
                            Editar
                            <form action="{{ route('admin.imoveis.destroy', $imovel->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="border: 0;background:transparent;">
                                    <span style="cursor:pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem imóveis cadastrados.</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <div class="fixed-action-btn">
            <a href="{{ route('admin.imoveis.create') }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection