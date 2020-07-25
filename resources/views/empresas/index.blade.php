
  @extends('estrutura.layout') 
  
@section('title')
Filtro Produto
@endsection

  @section('h1')
  <h1 class="text-center text-white my-2 p-2 text-uppercase">Filtros</h1>
  @endsection

  @section('content')
  

<div class="card container form-group p-3">

    <form action="{{ route('empresas') }}" method="GET">

            <div class="form-check my-2">
                <input class="form-check-input" type="checkbox" name="filtros[mercado]" value="1"  id="mercado" @isset(request()->get('filtros')['mercado']) checked @endisset>
                <label class="form-check-label" for="mercado">mercado</label>
            </div>
            <div class="form-check my-2">
                <input class="form-check-input" type="checkbox" name="filtros[alimentos]" value="1" id="alimentos" @isset(request()->get('filtros')['alimentos']) checked @endisset>
                <label class="form-check-label" for="alimentos">alimentos</label>
            </div>
            <div class="form-check my-2">
                <input class="form-check-input" type="checkbox" name="filtros[cosmeticos]" value="1" id="cosmeticos" @isset(request()->get('filtros')['cosmeticos']) checked @endisset>
                <label class="form-check-label" for="cosmeticos">cosméticos</label>
            </div>

        <button class="btn btn-outline-dark my-2">Filtrar</button>
        
    </form>
</div>


<div class="empresas card">

    <div class="container empresa list-group-item">
        <h2>Extra</h2>
        <p>Tags: mercado, supermercado, alimentos, banheiro, pão</p>
    </div>
    <div class="container empresa list-group-item">
        <h2>DrogaRaia</h2>
        <p>Tags: cosméticos, medicamentos, banheiro</p>
    </div>
    <div class="container empresa list-group-item">
        <h2>Panificadora do Zé</h2>
        <p>Tags: lanches, pratos, pão</p>
    </div>

</div>

@endsection
    
    




