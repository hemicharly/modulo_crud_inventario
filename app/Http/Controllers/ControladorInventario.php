<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use PhpParser\Node\Expr\Array_;

class ControladorInventario extends Controller
{
    public function index()
    {
        $listaInventarios = Inventario::paginate(2);
        return view('inventario', compact(['listaInventarios']));
    }

    public function searchInventario(Request $request, Inventario $inventario)
    {
        $dataForm = $request->except('_token');

        if ($dataForm['codigoProduto'] != null && $dataForm['codigoProduto'] != "") {
            $listaInventarios = $inventario->where('codigoProduto', 'like', $dataForm['codigoProduto'])->paginate(3);
            return view('inventario', compact(['listaInventarios']));
        } 
        
        if ($dataForm['descricaoProduto'] != null && $dataForm['descricaoProduto'] != "") {
            $listaInventarios = $inventario->where('descricaoProduto', 'like', $dataForm['descricaoProduto'])->paginate(3);
            return view('inventario', compact(['listaInventarios']));
        }

        $listaInventarios = $inventario->paginate(3);
        return view('inventario', compact(['listaInventarios']));
    }

    public function create()
    {
        return view('novoinventario');
    }

    public function store(Request $request)
    {
        $regras = [
            'codigoProduto' => 'required|unique:inventarios',
            'descricaoProduto' => 'required',
            'qtdeProduto' => 'required',
            'precoProduto' => 'required'
        ];

        $mensagens = [
            'codigoProduto.required' => 'O código do produto é obrigatório',
            'codigoProduto.unique' => 'Já existe este código do produto cadastrado',
            'descricaoProduto.required' => 'A descrição do produto é obrigatório',
            'qtdeProduto.required' => 'A quantidade de produto é obrigatório',
            'precoProduto.required' => 'O preço do produto é obrigatório'
        ];

        $request->validate($regras, $mensagens);

        $inv = new Inventario();
        $inv->codigoProduto = $request->input('codigoProduto');
        $inv->descricaoProduto = $request->input('descricaoProduto');
        $inv->qtdeProduto = $request->input('qtdeProduto');
        $inv->precoProduto = $request->input('precoProduto');
        $inv->save();
        return redirect('/inventario');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $inv = Inventario::find($id);
        if (isset($inv)) {
            return view('editarinventario', compact('inv'));
        } else
            return redirect('/inventario');
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'codigoProduto' => 'required|unique:inventarios,codigoProduto,' . $request->id,
            'descricaoProduto' => 'required',
            'qtdeProduto' => 'required',
            'precoProduto' => 'required'
        ];

        $mensagens = [
            'codigoProduto.required' => 'O código do produto é obrigatório',
            'codigoProduto.unique' => 'Já existe este código do produto cadastrado',
            'descricaoProduto.required' => 'A descrição do produto é obrigatório',
            'qtdeProduto.required' => 'A quantidade de produto é obrigatório',
            'precoProduto.required' => 'O preço do produto é obrigatório'
        ];

        $request->validate($regras, $mensagens);

        $inv = Inventario::find($id);
        if (isset($inv)) {
            $inv->codigoProduto = $request->input('codigoProduto');
            $inv->descricaoProduto = $request->input('descricaoProduto');
            $inv->qtdeProduto = $request->input('qtdeProduto');
            $inv->precoProduto = $request->input('precoProduto');
            $inv->save();
        }
        return redirect('/inventario');
    }

    public function destroy($id)
    {
        $inv = Inventario::find($id);
        if (isset($inv)) {
            $inv->delete();
        }
        return redirect('/inventario');
    }
}
