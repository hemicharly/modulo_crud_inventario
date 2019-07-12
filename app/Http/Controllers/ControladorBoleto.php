<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class ControladorBoleto extends Controller
{

    private function validateData(Request $request)
    {
        $regras = [
            'nome_cliente' => 'required|min:3|max:80',
            'cpf_cliente' => 'required|min:11|max:14',
            'cep_cliente' => 'required|max:10',
            'endereco_cliente' => 'required|min:3|max:80',
            'numero_cliente' => 'required|max:10',
            'bairro_cliente' => 'required|min:3|max:80',
            'cidade_cliente' => 'required|min:3|max:80',
            'estado_cliente' => 'required|min:2|max:2',
            'pedido_numero' => 'required|max:20',
            'grupo' => 'required|max:60',
            'juros' => 'required',
            'multa' => 'required',
            'desconto' => 'required',
            'vencimento' => 'required'
        ];

        $mensagens = [
            'nome_cliente.required' => 'O nome é obrigatório',
            'nome_cliente.max' => 'Use no maximo 80 caracteres',
            'nome_cliente.min' => 'Use no minimo 3 caracteres',
            'cpf_cliente.required' => 'O cpf é obrigatório',
            'cpf_cliente.max' => 'Use no maximo 14 caracteres',
            'cpf_cliente.min' => 'Use no minimo 11 caracteres',
            'cep_cliente.required' => 'Cep é obrigatório',
            'cep_cliente.max' => 'Use no maximo 10 caracteres',
            'endereco_cliente.required' => 'O endereço é obrigatório',
            'endereco_cliente.max' => 'Use no maximo 80 caracteres',
            'endereco_cliente.min' => 'Use no minimo 3 caracteres',
            'numero_cliente.required' => 'O número é obrigatório',
            'numero_cliente.max' => 'Use no maximo 10 caracteres',
            'bairro_cliente.required' => 'O bairro é obrigatório',
            'bairro_cliente.max' => 'Use no maximo 80 caracteres',
            'bairro_cliente.min' => 'Use no minimo 3 caracteres',
            'cidade_cliente.required' => 'A cidade é obrigatório',
            'cidade_cliente.max' => 'Use no maximo 80 caracteres',
            'cidade_cliente.min' => 'Use no minimo 3 caracteres',
            'estado_cliente.required' => 'O estado é obrigatório',
            'estado_cliente.max' => 'Use no maximo 2 caracteres',
            'estado_cliente.min' => 'Use no minimo 2 caracteres',
            'pedido_numero.required' => 'O número do pedido é obrigatório',
            'pedido_numero.max' => 'Use no maximo 20 caracteres',
            'grupo.required' => 'O grupo de boletos é obrigatório',
            'grupo.max' => 'Use no maximo 60 caracteres',
            'juros.required' => 'O juro é obrigatório',
            'multa.required' => 'A multa é obrigatório',
            'desconto.required' => 'O desconto é obrigatório',
            'vencimento.required' => 'O vencimento é obrigatório'
        ];

        $request->validate($regras, $mensagens);
    }

    private function carregarBody(Request $request)
    {
        $body = [];
        $body['nome_cliente'] = $request->input('nome_cliente');
        $body['cpf_cliente'] = $request->input('cpf_cliente');
        $body['cep_cliente'] = $request->input('cep_cliente');
        $body['endereco_cliente'] = $request->input('endereco_cliente');
        $body['numero_cliente'] = $request->input('numero_cliente');
        $body['bairro_cliente'] = $request->input('bairro_cliente');
        $body['cidade_cliente'] = $request->input('cidade_cliente');
        $body['estado_cliente'] = $request->input('estado_cliente');
        $body['pedido_numero'] = $request->input('pedido_numero');
        $body['grupo'] = $request->input('grupo');
        $body['juros'] = $request->input('juros');
        $body['multa'] = $request->input('multa');
        $body['desconto'] = $request->input('desconto');
        $body['vencimento'] = date("m/d/Y", strtotime($request->input('vencimento')));
        $body['valor'] = $request->input('valor');

        return $body;
    }

    private function gerarBoleto(Request $request)
    {
        /*
            {
                "status": "201",
                "msg": "Sucesso ao credenciar",
                "credencial": "8988d4a63d5fae2a341a4acb965ea5f750b48ea3",
                "chave": "3ac6c47dd7e4ff406a498fc3113207b2d61f8e87",
                "conta_virtual": "131332",
                "agencia_virtual": ""
            }
        */

        $curl = curl_init();

        $formData = $this->carregarBody($request);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.pjbank.com.br/recebimentos/8988d4a63d5fae2a341a4acb965ea5f750b48ea3/transacoes",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($formData),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!$err) {
            return $this->linkDownloadBoleto(json_decode($response));
        } else {
            return null;
        }
    }

    private function linkDownloadBoleto($response)
    {
        if ($response->status == '201') {
            return $response->linkBoleto;
        } else {
            return null;
        }
    }

    public function index()
    {
        $inventario = Inventario::sumPrecoTotal();
        $linkDownloadBoleto = null;
        return view('gerarboleto', compact('inventario', 'linkDownloadBoleto'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validateData($request);
        $linkDownloadBoleto = $this->gerarBoleto($request);
        if (isset($linkDownloadBoleto)) {
            $inventario = Inventario::sumPrecoTotal();
            return view('gerarboleto', compact('inventario', 'linkDownloadBoleto'));
        } else {
            return redirect('/boleto');
        }
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
