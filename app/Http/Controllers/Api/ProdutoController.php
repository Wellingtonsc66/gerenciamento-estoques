<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoData;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dados_request = $request->all();
        $produto = Produto::where('skuId', $dados_request['skuId'])->first();
        if (empty($produto) && $dados_request['produto_qnt'] > 0) {
            $result = Produto::create($dados_request);
            return ProdutoData::create([
            'produto_id'        => $result['produto_id'],
            'produto_data_qnt'  => $dados_request['produto_qnt'],
            'produto_data_data' => date('Y-m-d H:i:s'),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dados_request = $request->all();
        $produto = Produto::where('skuId', $dados_request['skuId'])->first();
        if ($produto['produto_qnt'] > $dados_request['produto_qnt']) {
            Produto::where('skuId', $dados_request['skuId'])->update([
                'produto_qnt' => $produto['produto_qnt'] - $dados_request['produto_qnt'],
            ]);
            return ProdutoData::create([
                'produto_id'        => $produto['produto_id'],
                'produto_data_qnt'  => $dados_request['produto_qnt']*-1,
                'produto_data_data' => date('Y-m-d H:i:s'),
            ]);
        }
    }

}
