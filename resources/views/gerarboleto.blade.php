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
                        <input type="text" class="form-control text-uppercase {{ $errors->has('nome_cliente') ? 'is-invalid' : '' }}" name="nome_cliente" id="nome_cliente" placeholder="Nome do cliente" value="{{ old('nome_cliente') }}">
                        @if ($errors->has('nome_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-left">
                    <div class="form-group">
                        <label for="cpf_cliente">Cpf</label>
                        <input type="text" class="form-control {{ $errors->has('cpf_cliente') ? 'is-invalid' : '' }}" name="cpf_cliente" id="cpf_cliente" placeholder="Cpf do cliente" value="{{ old('cpf_cliente') }}">
                        @if ($errors->has('cpf_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cpf_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <p> Informações básicas </p>
            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="cep_cliente">Cep</label>
                        <input type="text" class="form-control {{ $errors->has('cep_cliente') ? 'is-invalid' : '' }}" name="cep_cliente" id="cep_cliente" placeholder="Cep do cliente" value="{{ old('cep_cliente') }}">
                        @if ($errors->has('cep_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cep_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="endereco_cliente">Endereço</label>
                        <input type="text" class="form-control text-uppercase {{ $errors->has('endereco_cliente') ? 'is-invalid' : '' }}" name="endereco_cliente" id="endereco_cliente" placeholder="Endereço do cliente" value="{{ old('endereco_cliente') }}">
                        @if ($errors->has('endereco_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('endereco_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="numero_cliente">Número</label>
                        <input type="text" class="form-control {{ $errors->has('numero_cliente') ? 'is-invalid' : '' }}" name="numero_cliente" id="numero_cliente" placeholder="Número endereço" value="{{ old('numero_cliente') }}">
                        @if ($errors->has('numero_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('numero_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-left">
                    <div class="form-group">
                        <label for="bairro_cliente">Bairro</label>
                        <input type="text" class="form-control text-uppercase {{ $errors->has('bairro_cliente') ? 'is-invalid' : '' }}" name="bairro_cliente" id="bairro_cliente" placeholder="Bairro do cliente" value="{{ old('bairro_cliente') }}">
                        @if ($errors->has('bairro_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bairro_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <div class="form-group">
                        <label for="cidade_cliente">Cidade</label>
                        <input type="text" class="form-control text-uppercase {{ $errors->has('cidade_cliente') ? 'is-invalid' : '' }}" name="cidade_cliente" id="cidade_cliente" placeholder="Cidade do cliente" value="{{ old('cidade_cliente') }}">
                        @if ($errors->has('cidade_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cidade_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="estado_cliente">Estado</label>
                        <input type="text" class="form-control text-uppercase {{ $errors->has('estado_cliente') ? 'is-invalid' : '' }}" name="estado_cliente" id="estado_cliente" placeholder="Estado" value="{{ old('estado_cliente') }}">
                        @if ($errors->has('estado_cliente'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estado_cliente') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <p> Dados do boleto </p>
            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="pedido_numero">Número pedido</label>
                        <input type="number" class="form-control {{ $errors->has('pedido_numero') ? 'is-invalid' : '' }}" name="pedido_numero" id="pedido_numero" value="" placeholder="Número do pedido" value="{{ old('pedido_numero') }}">
                        @if ($errors->has('pedido_numero'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pedido_numero') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="grupo">Grupo boleto</label>
                        <input type="text" class="form-control {{ $errors->has('grupo') ? 'is-invalid' : '' }}" name="grupo" id="grupo" value="" placeholder="Grupo de boletos" value="{{ old('grupo') }}">
                        @if ($errors->has('grupo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('grupo') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="juros">Juros</label>
                        <input type="number" step="any" class="form-control {{ $errors->has('juros') ? 'is-invalid' : '' }}" name="juros" id="juros" value="{{ old('juros') | 0 }}">
                        @if ($errors->has('juros'))
                        <div class="invalid-feedback">
                            {{ $errors->first('juros') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="multa">Multas</label>
                        <input type="number" step="any" class="form-control {{ $errors->has('multa') ? 'is-invalid' : '' }}" name="multa" id="multa" value="{{ old('multa') | 0 }}">
                        @if ($errors->has('multa'))
                        <div class="invalid-feedback">
                            {{ $errors->first('multa') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 text-left">
                    <div class="form-group">
                        <label for="desconto">Desconto</label>
                        <input type="number" step="any" class="form-control {{ $errors->has('desconto') ? 'is-invalid' : '' }}" name="desconto" id="desconto" value="{{ old('desconto') | 0 }}">
                        @if ($errors->has('desconto'))
                        <div class="invalid-feedback">
                            {{ $errors->first('desconto') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 text-left">
                    <div class="form-group">
                        <label for="vencimento">Vencimento</label>
                        <input type="date" class="form-control {{ $errors->has('vencimento') ? 'is-invalid' : '' }}" name="vencimento" id="vencimento" value="{{ old('vencimento')}}">
                        @if ($errors->has('vencimento'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vencimento') }}
                        </div>
                        @endif
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
                <button type="submit" class="btn btn-dark btn-md">Gerar Boleto</button>
                <a href="/boleto" class="btn btn-danger btn-md">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection