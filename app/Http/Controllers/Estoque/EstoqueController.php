<?php

namespace App\Http\Controllers\Estoque;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\ProdutoData;
use App\Models\User;
use Illuminate\Http\Request;

class EstoqueController extends Controller {
    protected $usuario, $produto, $produtoData;
    public function __construct() {
        $this->usuario = new User();
        $this->produto = new Produto();
        $this->produto = new ProdutoData();
    }

    public function adicionar() {
        var_dump($this->produto::all()->toArray());
        return view('estoque.adicionar');
    }

    public function baixar() {
        return view('estoque.baixar');
    }

    public function relatorio() {
        return view('estoque.relatorio');
    }

}
