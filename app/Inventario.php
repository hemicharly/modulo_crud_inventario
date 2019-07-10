<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    public function filter(array $data, $totalPage)
    {
        $inventario = $this->where(function ($query) use ($data) {
            if (isset($data['codigoProduto']))
                $query->where('codigoProduto', 'like', '%' . $data['codigoProduto'] . '%');

            if (isset($data['descricaoProduto']))
                $query->where('descricaoProduto', 'like', '%' . $data['descricaoProduto'] . '%');
        })->paginate($totalPage);

        return $inventario;
    }

    public static function sumPrecoTotal()
    {
        $inventario = DB::table('inventarios')->select((DB::raw('sum(qtdeProduto * precoProduto) as precoTotal')))->first();
        return $inventario;
    }
}
