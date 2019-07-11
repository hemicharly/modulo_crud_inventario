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
            'cpf_cliente' => 'required|min:11|max:14',
            'cep_cliente' => 'required|max:10',
            'endereco_cliente' => 'required|max:80',
            'numero_cliente' => 'required|max:10',
            'bairro_cliente' => 'required|max:80',
            'cidade_cliente' => 'required|max:80',
            'estado_cliente' => 'required|max:2',
            'pedido_numero' => 'required|max:20',
            'grupo' => 'required|max:60',
            'juros' => 'required',
            'multa' => 'required',
            'desconto' => 'required',
            'vencimento' => 'required|data'
        ];

        $mensagens = [
            'nome_cliente.required' => 'O nome é obrigatório',
            'cpf_cliente.required' => 'O cpf é obrigatório',
            'cpf_cliente.max' => 'Use no maximo 14 caracteres',
            'cpf_cliente.min' => 'Use no minimo 11 caracteres',
            'cep_cliente.required' => 'Cep é obrigatório',
            'cep_cliente.max' => 'Use no maximo 10 caracteres',
            'endereco_cliente.required' => 'O endereço é obrigatório',
            'endereco_cliente.max' => 'Use no maximo 80 caracteres',
            'numero_cliente.required' => 'O número é obrigatório',
            'numero_cliente.max' => 'Use no maximo 10 caracteres',
            'bairro_cliente.required' => 'O bairro é obrigatório',
            'bairro_cliente.max' => 'Use no maximo 80 caracteres',
            'cidade_cliente.required' => 'A cidade é obrigatório',
            'cidade_cliente.max' => 'Use no maximo 80 caracteres',
            'estado_cliente.required' => 'O estado é obrigatório',
            'estado_cliente.max' => 'Use no maximo 2 caracteres',
            'pedido_numero.required' => 'O número do pedido é obrigatório',
            'pedido_numero.max' => 'Use no maximo 20 caracteres',
            'grupo.required' => 'O grupo de boletos é obrigatório',
            'grupo.max' => 'Use no maximo 60 caracteres',
            'juros.required' => 'O juro é obrigatório',
            'multa.required' => 'A multa é obrigatório',
            'desconto.required' => 'O desconto é obrigatório',
            'vencimento.required' => 'O vencimento é obrigatório',
            'vencimento.data' => 'Vencimento inválido'
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
