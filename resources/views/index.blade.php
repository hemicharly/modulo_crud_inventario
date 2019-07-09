@extends('layout.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de produtos</h5>
                    <p class="card=text">
                        Aqui você cadastra o inventário
                    </p>
                    <a href="/inventario" class="btn btn-primary">Cadastro de inventário</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Categorias</h5>
                    <p class="card=text">
                        Cadastre as categorias dos seus produtos
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastre suas categorias</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection