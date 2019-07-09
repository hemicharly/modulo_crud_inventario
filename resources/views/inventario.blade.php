@extends('layout.app', ["current" => "inventario" ])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title text-uppercase">Cadastro de Inventários</h5>
        @if(count($listaInventarios) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th class="text-uppercase">Código Prod.</th>
                    <th class="text-uppercase">Descrição Prod.</th>
                    <th class="text-uppercase text-center">Qtd. Prod.</th>
                    <th class="text-uppercase text-center">Preço Prod.</th>
                    <th class="text-uppercase text-center">Preço Total</th>
                    <th class="text-uppercase text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listaInventarios as $inv)
                <tr>
                    <td>{{$inv->codigoProduto}}</td>
                    <td class="text-uppercase">{{$inv->descricaoProduto}}</td>
                    <td class="text-center">{{$inv->qtdeProduto}}</td>
                    <td class="text-center">{{$inv->precoProduto}}</td>
                    <td class="text-center">{{$inv->qtdeProduto*$inv->precoProduto}}</td>
                    <td class="text-center">
                        <a href="/inventario/editar/{{$inv->id}}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="/inventario/apagar/{{$inv->id}}" class="btn btn-danger btn-sm">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="card-footer text-center">
        <a href="/inventario/novo" class="btn btn-primary btn-md" role="button">Novo inventário</a>
    </div>
</div>
@endsection