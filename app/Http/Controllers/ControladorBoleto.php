<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class ControladorBoleto extends Controller
{
    public function index()
    {
        $inventario = Inventario::sumPrecoTotal();
        return view('gerarboleto', compact('inventario'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
