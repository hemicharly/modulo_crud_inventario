@extends('layout.app', ["current" => "home"])

@section('body')

<div class="jumbotron bg-light border">
    <div class="row">
        <div class="col-md-6 m-auto">

            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body ">
                        <h5 class="card-title text-center">INVENTÁRIO</h5>
                        <hr>
                        <p class="card=text">
                            Aqui você cadastra seus inventários
                        </p>
                        <div class="text-center">
                            <a href="/inventario" class="btn btn-primary">Inventário</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 m-auto">
                    <div class="card-deck">
                        <div class="card border border-primary">
                            <div class="card-body ">
                                <h5 class="card-title text-center">BOLETO</h5>
                                <hr>
                                <p class="card=text">
                                    Aqui você gera boleto de inventários
                                </p>
                                <div class="text-center">
                                    <a href="/boleto" class="btn btn-primary">Boleto</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection