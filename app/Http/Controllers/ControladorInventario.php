<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inventario;

class ControladorInventario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaInventarios = Inventario::paginate(2);
        return view('inventario', compact(['listaInventarios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoinventario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inv = Inventario::find($id);
        if (isset($inv)) {
            return view('editarinventario', compact('inv'));
        } else
            return redirect('/inventario');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inv = Inventario::find($id);
        if (isset($inv)) {
            $inv->delete();
        }
        return redirect('/inventario');
    }
}
