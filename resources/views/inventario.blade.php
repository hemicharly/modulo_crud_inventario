@extends('layout.app', ["current" => "inventario" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <div class="row">
            <div class="col-md-9 m-auto text-left">
                <h5 class="card-title text-uppercase">Lista de Inventários</h5>
            </div>
            <div class="col-md-3 m-auto text-right">
                <a href="/inventario/novo" class="card-title btn btn-block btn-success btn-md" role="button">Novo inventário</a>
            </div>
        </div>
        @if(count($listaInventarios) > 0)
        <div class="table-responsive">
            <table class="table table-reponsive table-ordered table-md table-hover">
                <thead class="thead-light">
                    <tr>
                        <th class="text-uppercase">Código Prod.</th>
                        <th class="text-uppercase">Descrição Prod.</th>
                        <th class="text-uppercase text-center">Qtd. Prod.</th>
                        <th class="text-uppercase text-center">Preço Prod.</th>
                        <th class="text-uppercase text-center">Preço Total</th>
                        <th class="text-uppercase text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaInventarios as $inv)
                    <tr>
                        <td>{{$inv->codigoProduto}}</td>
                        <td class="text-uppercase">{{$inv->descricaoProduto}}</td>
                        <td class="text-center">{{$inv->qtdeProduto}}</td>
                        <td class="text-center">{{ ''.number_format($inv->precoProduto, 2, ',', '.') }}</td>
                        <td class="text-center">{{ ''.number_format($inv->qtdeProduto*$inv->precoProduto, 2, ',', '.')}}</td>
                        <td class="text-right">
                            <a href="/inventario/editar/{{$inv->id}}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="/inventario/apagar/{{$inv->id}}" class="btn btn-danger btn-sm">Apagar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-5 m-auto text-left">
                <p class="card-title">Exibindo {{$listaInventarios->count()}} inventário(s) de {{$listaInventarios->total()}}
                    ( {{$listaInventarios->firstItem()}} a {{$listaInventarios->lastItem()}} ) </p>
            </div>
            <div class="col-md-7 m-auto text-center">
                {{ $listaInventarios->links() }}
            </div>
        </div>
    </div>
</div>
@endsection