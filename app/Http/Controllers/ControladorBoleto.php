<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class ControladorBoleto extends Controller
{
    private function validateData(Request $request)
    {
        $regras = [
            'nome_cliente' => 'required',
            'cpf_cliente' => 'required',
            'cep_cliente' => 'required',
            'endereco_cliente' => 'required',
            'numero_cliente' => 'required',
            'bairro_cliente' => 'required',
            'cidade_cliente' => 'required',
            'estado_cliente' => 'required',
            'pedido_numero' => 'required',
            'grupo' => 'required',
            'juros' => 'required',
            'multa' => 'required',
            'desconto' => 'required',
            'vencimento' => 'required'
        ];

        $mensagens = [
            'nome_cliente.required' => 'O nome é obrigatório',
            'cpf_cliente.required' => 'O cpf é obrigatório',
            'cep_cliente.required' => 'Cep é obrigatório',
            'endereco_cliente.required' => 'O endereço é obrigatório',
            'numero_cliente.required' => 'O número é obrigatório',
            'bairro_cliente.required' => 'O bairro é obrigatório',
            'cidade_cliente.required' => 'A cidade é obrigatório',
            'estado_cliente.required' => 'O estado é obrigatório',
            'pedido_numero.required' => 'O número do pedido é obrigatório',
            'grupo.required' => 'O grupo de boletos é obrigatório',
            'juros.required' => 'O juro é obrigatório',
            'multa.required' => 'A multa é obrigatório',
            'desconto.required' => 'O desconto é obrigatório',
            'vencimento.required' => 'O vencimento é obrigatório'
        ];

        $request->validate($regras, $mensagens);
    }

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
        $this->validateData($request);
        return redirect('/boleto');
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
