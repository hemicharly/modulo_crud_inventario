@extends('layout.app', ["current" => "inventario"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title text-uppercase">Editar Inventário</h5>
        <hr>
        <form action="/inventario/{{$inv->id}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="codigoProduto">Código do produto</label>
                        <input type="text" class="form-control {{ $errors->has('codigoProduto') ? 'is-invalid' : '' }}" name="codigoProduto" value="{{$inv->codigoProduto}}" id="codigoProduto" placeholder="Código do produto">
                        @if ($errors->has('codigoProduto'))
                        <div class="invalid-feedback">
                            {{ $errors->first('codigoProduto') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-9 text-left">
                    <div class="form-group">
                        <label for="descricaoProduto">Descrição do produto</label>
                        <input type="text" class="form-control text-uppercase {{ $errors->has('descricaoProduto') ? 'is-invalid' : '' }}" name="descricaoProduto" value="{{$inv->descricaoProduto}}" id="descricaoProduto" placeholder="Descrição do produto">
                        @if ($errors->has('descricaoProduto'))
                        <div class="invalid-feedback">
                            {{ $errors->first('descricaoProduto') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="qtdeProduto">Quantidade do produto</label>
                        <input type="number" class="form-control {{ $errors->has('qtdeProduto') ? 'is-invalid' : '' }}" name="qtdeProduto" value="{{$inv->qtdeProduto}}" id="qtdeProduto" placeholder="Quantidade do produto">
                        @if ($errors->has('qtdeProduto'))
                        <div class="invalid-feedback">
                            {{ $errors->first('qtdeProduto') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="precoProduto">Preço do produto</label>
                        <input type="number" step="any" class="form-control {{ $errors->has('precoProduto') ? 'is-invalid' : '' }}" name="precoProduto" value="{{$inv->precoProduto}}" id="precoProduto" placeholder="Preço do produto">
                        @if ($errors->has('precoProduto'))
                        <div class="invalid-feedback">
                            {{ $errors->first('precoProduto') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-md">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@endsection