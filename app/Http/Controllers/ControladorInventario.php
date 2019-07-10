<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;


class ControladorInventario extends Controller
{
    private $totalPage = 20;

    private function validateData(Request $request)
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
    }

    private function saveData(Inventario $inventario, Request $request){
        $inventario->codigoProduto = $request->input('codigoProduto');
        $inventario->descricaoProduto = $request->input('descricaoProduto');
        $inventario->qtdeProduto = $request->input('qtdeProduto');
        $inventario->precoProduto = $request->input('precoProduto');
        $inventario->save(); 
    }

    public function search(Request $request, Inventario $inventario)
    {
        $dataForm = $request->except('_token');

        $listaInventarios = $inventario->filter($dataForm, $this->totalPage);

        return view('inventario', compact('listaInventarios', 'dataForm'));
    }

    public function index()
    {
        $listaInventarios = Inventario::paginate($this->totalPage);
        return view('inventario', compact('listaInventarios'));
    }

    public function create()
    {
        return view('novoinventario');
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        $inventario = new Inventario();

        $this->saveData($inventario, $request);
   
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
        $this->validateData($request);

        $inventario = Inventario::find($id);
        if (isset($inventario)) {
            $this->saveData($inventario, $request);
        }
        return redirect('/inventario');
    }

    public function destroy($id)
    {
        $inventario = Inventario::find($id);
        if (isset($inventario)) {
            $inventario->delete();
        }
        return redirect('/inventario');
    }
}
