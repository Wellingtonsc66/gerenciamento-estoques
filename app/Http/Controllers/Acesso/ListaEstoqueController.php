<?php

namespace App\Http\Controllers\Acesso;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ListaEstoqueController extends Controller
{
    protected $usuario, $indicacao, $conta, $detalhe;
    public function __construct() {

    }

    public function index() {
        return view('acesso.index');
    }

}
