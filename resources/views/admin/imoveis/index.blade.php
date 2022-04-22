@extends('admin.layouts.principal')

@section('conteudo-principal')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->cidade->nome }}</td>
                        <td>{{ $imovel->endereco->bairro }}</td>
                        <td>{{ $imovel->titulo}}</td>
                        <td class="right-align">

                            {{-- Ver --}}
                            <a href="{{ route('admin.imoveis.show', $imovel->id) }}" title="ver">
                                <span>
                                    <i class="material-icons indigo-text text-darken-2">remove_red_eye</i>
                                </span>
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('admin.imoveis.edit', $imovel->id) }}" title="editar">
                                <span>
                                    <i class="material-icons blue-text text-accent-2">edit</i>
                                </span>
                            </a>

                            {{-- Remover --}}
                            <form action="{{ route('admin.imoveis.destroy', $imovel->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="border: 0;background:transparent;" title="remover">
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
