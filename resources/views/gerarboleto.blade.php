@extends('layout.app', ["current" => "boleto"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title text-uppercase">Gerando boleto</h5>
        <hr>
        <form action="/boleto" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 text-left">
                    <div class="form-group">
                        <label for="nome_cliente">Cliente</label>
                        <input type="text" class="form-control text-uppercase" name="nome_cliente" id="nome_cliente" placeholder="Nome do cliente">
                    </div>
                </div>
                <div class="col-md-4 text-left">
                    <div class="form-group">
                        <label for="cpf_cliente">Cpf</label>
                        <input type="text" class="form-control" name="cpf_cliente" id="cpf_cliente" placeholder="Cpf do cliente">
                    </div>
                </div>
            </div>
            <hr>
            <p> Informações básicas </p>
            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="cep_cliente">Cep</label>
                        <input type="text" class="form-control" name="cep_cliente" id="cep_cliente" placeholder="Cep do cliente">
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="endereco_cliente">Endereço</label>
                        <input type="text" class="form-control text-uppercase" name="endereco_cliente" id="endereco_cliente" placeholder="Endereço do cliente">
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="numero_cliente">Número</label>
                        <input type="text" class="form-control" name="numero_cliente" id="numero_cliente" placeholder="Número endereço">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">
                    <div class="form-group">
                        <label for="bairro_cliente">Bairro</label>
                        <input type="text" class="form-control text-uppercase" name="bairro_cliente" id="bairro_cliente" placeholder="Bairro do cliente">
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="cidade_cliente">Cidade</label>
                        <input type="text" class="form-control text-uppercase" name="cidade_cliente" id="cidade_cliente" placeholder="Cidade do cliente">
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="estado_cliente">Estado</label>
                        <input type="text" class="form-control text-uppercase" name="estado_cliente" id="estado_cliente" placeholder="Estado">
                    </div>
                </div>
            </div>
            <hr>
            <p> Dados do boleto </p>
            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="pedido_numero">Número pedido</label>
                        <input type="number" class="form-control" name="pedido_numero" id="pedido_numero" value="" placeholder="Número do pedido">

                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="grupo">Grupo boleto</label>
                        <input type="text" class="form-control" name="grupo" id="grupo" value="" placeholder="Grupo de boletos">
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="juros">Juros</label>
                        <input type="number" step="any" class="form-control" name="juros" id="juros" value="0">
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="multa">Multas</label>
                        <input type="number" step="any" class="form-control" name="multa" id="multa" value="0">
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="desconto">Desconto</label>
                        <input type="number" step="any" class="form-control" name="desconto" id="desconto" value="0">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="vencimento">Vencimento</label>
                        <input type="date" class="form-control" name="vencimento" id="vencimento" value="">
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="valor">Valor boleto</label>
                        <input type="text" class="form-control" name="valor" id="valor" readonly value="{{ ''.number_format($inventario->precoTotal, 2, ',', '.') }}">
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-dark btn-md">Gerar</button>
                <a href="/boleto" class="btn btn-danger btn-md">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection