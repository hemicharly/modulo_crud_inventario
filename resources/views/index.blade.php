@extends('layout.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body ">
                    <h5 class="card-title text-center">CADASTRO DE INVENTÁRIOS</h5>
                    <hr>
                    <p class="card=text">
                        Aqui você cadastra seus inventários
                    </p>
                    <div class="text-center">
                        <a href="/inventario" class="btn btn-primary">Inventário</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection