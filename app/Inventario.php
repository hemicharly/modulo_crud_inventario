<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
