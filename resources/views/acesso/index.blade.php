@extends('templates.template')
@section('subtitulo', 'Início')
@section('head')
    <script src="{{asset('js/acesso/script-ajax.js')}}"></script>
@endsection

@section('body')
    <div class="content-login">
        <div class="nome-campo">Login</div>
        <form method="post" action="#">
            {{ csrf_field() }}
            <div class="cada-form">
                <label>Login</label>
                <input type="text" name="login" maxlength="20" value="{{old('login')}}">
            </div>
            <div class="cada-form">
                <label>Senha</label>
                <input type="password" name="password" maxlength="30" value="{{old('password')}}">
            </div>
            <div style="margin-top: 25px;">
                <button id="btn-login">Entrar</button>
                <a id="abre-modal" href="javascript:void(0)" style="color: #1e88e5;text-decoration: none;">Recuperar senha</a>
            </div>
        </form>
    </div>
    <div class="modal-fundo" style="display: none">
        <div class="modal" style="display: none;">
            <div class="modal-titulo">
                <label>Digite seu e-mail</label>
                <a id="fechar" href="javascript:void(0)"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <input type="email" name="recuperacao" maxlength="50" placeholder="Seu e-mail..">
            <div class="modal-bar-enviar">
                <button id="recuperar">Recuperar</button>
            </div>
        </div>
    </div>
@endsection
