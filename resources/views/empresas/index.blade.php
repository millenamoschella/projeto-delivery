@extends('estrutura.layout')

@section('title')
    Filtro Produto
@endsection

@section('h1')
    <h1 class="text-center text-white my-2 p-2 text-uppercase">Tags</h1>
@endsection

@section('content')


    <div class="card container form-group p-3">
        <form action="{{ route('empresas') }}" method="GET">

            @foreach ($tags as $tag)

                <div class="form-check my-2">

                    <input class="form-check-input" type="checkbox" name="filtros[{{ $tag->nome }}]" value="{{ $tag->id }}"
                        id="mercado" @isset(request()->get('filtros')[$tag->nome]) checked @endisset>
                    <label class="form-check-label" for="{{ $tag->id }}">{{ $tag->nome }}</label>

                </div>

            @endforeach

            <button class="btn btn-outline-dark my-2">Filtrar</button>

            {{-- LIMPAR FILTRO --}}
            <button class="btn btn-outline-dark my-2">
                <a href="{{ route('empresas') }}">Limpar</a>
            </button>

        </form>
    </div>


    <h2 class="text-center text-white my-2 p-2 text-uppercase">Empresas</h2>
    <div class="empresas card">

        {{-- <div class="container empresa list-group-item">
            @foreach ($empresas as $emp)
                <h2>{{ $emp->nome }}</h2>
            @endforeach
        </div> --}}

        <div class="container empresa list-group-item">
            {{-- ALTERNATIVA PARA QUANDO NÃO EXISTE UMA TAG ATRELADA A EMPRESA, PARA NÃO FICAR
            EM BRANCO A TELA QUANDO NÃO ENCONTRAR A EMPRESA --}}
            @forelse($empresas as $empresa)
                <div class="empresa">
                    <h2>{{ $empresa->nome }}</h2>
                    <p> Tags:
                        @foreach ($empresa->tags as $tag)
                            <a href="">{{ $tag->nome }}</a>
                        @endforeach
                    </p>
                </div>
            @empty
                <div class="empresa">
                    <h2>Empresas não encontradas</h2>
                </div>
            @endforelse
        </div>


    </div>
@endsection
