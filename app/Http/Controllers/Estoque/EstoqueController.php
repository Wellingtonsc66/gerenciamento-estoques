<?php

namespace App\Http\Controllers\Estoque;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstoqueController extends Controller {
    protected $user, $produto, $produtoData;
    public function __construct() {
        $this->user = new User();
        $this->produto = new Produto();
        $this->produtoData = new ProdutoData();
    }

    public function adicionar(Request $request) {
        $user = Auth::user()->toArray();
        $dados_request = $request->toArray();
        if ($dados_request) {
            if (isset($dados_request['produto_id']) && !empty($dados_request['produto_id'])) {
                $find_produto = $this->produto->find($dados_request['produto_id']);
                $this->produto->where('produto_id', $dados_request['produto_id'])->update([
                    'produto_qnt' => $find_produto['produto_qnt'] + $dados_request['produto_qnt'],
                ]);
            } else {
                $find_produto = $this->produto->where('skuId', $dados_request['skuId'])->first();
                if ($find_produto) {
                    return redirect()->back()->with([
                        'msg_error' => 'O SKU informado já foi registrado no sistema.',
                    ])->withInput();
                } else if ($dados_request['produto_qnt'] <= 0) {
                    return redirect()->back()->with([
                        'msg_error' => 'A qantidade de produtos informada não é aceita.',
                    ])->withInput();
                }
                $result_insert = $this->produto->create($dados_request);
            }
            $this->produtoData->create([
                'usuario_id'        => $user['id'],
                'produto_id'        => isset($result_insert['produto_id']) ? $result_insert['produto_id'] : $dados_request['produto_id'],
                'produto_data_qnt'  => $dados_request['produto_qnt'],
                'produto_data_data' => date('Y-m-d H:i:s'),
            ]);
        }
        $produtos = $this->produto->all()->toArray();
        return view('estoque.adicionar', compact('produtos'));
    }

    public function baixar(Request $request) {
        $user = Auth::user()->toArray();
        $dados_request = $request->toArray();
        if ($dados_request) {
            if ($dados_request['produto_qnt'] <= 0) {
                return redirect()->back()->with([
                    'msg_error' => 'A qantidade de produtos para baixar não é aceita.',
                ])->withInput();
            }
            $find_produto = $this->produto->find($dados_request['produto_id']);
            if ($find_produto['produto_qnt'] < $dados_request['produto_qnt']) {
                return redirect()->back()->with([
                    'msg_error' => 'A quantidade de produtos para baixar é superior ao estoque.',
                ])->withInput();
            }
            $this->produto->where('produto_id', $dados_request['produto_id'])->update([
                'produto_qnt' => $find_produto['produto_qnt'] - $dados_request['produto_qnt'],
            ]);
            $this->produtoData->create([
                'usuario_id'        => $user['id'],
                'produto_id'        => $dados_request['produto_id'],
                'produto_data_qnt'  => $dados_request['produto_qnt']*-1,
                'produto_data_data' => date('Y-m-d H:i:s'),
            ]);
        }
        $produtos = $this->produto->where('produto_qnt', '>', '0')->get();
        return view('estoque.baixar', compact('produtos'));
    }

    public function relatorio() {
        $relatorio = $this->produtoData->whereBetween('produto_data_data', [date('Y-m-d'), date('Y-m-d', strtotime('+1 day'))])->get()->toArray();
        foreach ($relatorio as $key=>$cada_item) {
            $usuario = $this->user->find($cada_item['usuario_id']);
            $produto = $this->produto->find($cada_item['produto_id']);
            $relatorio[$key]['name'] = !empty($usuario['name']) ? $usuario['name'] : 'Via API';
            $relatorio[$key]['skuId'] = $produto['skuId'];
            $relatorio[$key]['produto_nome'] = $produto['produto_nome'];
        }
        return view('estoque.relatorio', compact('relatorio'));
    }

}
