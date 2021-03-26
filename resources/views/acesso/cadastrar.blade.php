@extends('templates.template')
@section('subtitulo', 'Cadastrar')
@section('head')
    <script src="{{asset('js/acesso/form-cadastro.js')}}"></script>
@endsection

@section('body')
    <div class="content-cadastro">
        <div class="nome-campo">Cadastro</div>
        <form method="post" action="{{route('cadastrar')}}">
            {{ csrf_field() }}
            <span id="obrigatorio">* Campo obrigatório</span>
            <span id="obrigatorio2" style="color: #1e88e5; float: right; margin-right: 15px">
                @if(!empty($login))* Você é indicado de: {{$login}}
                    <input type="hidden" name="indicado" value="{{$login}}">
                @else* Você não possui uma indicação
                @endif
            </span>
            <div class="cada-form">
                <label>Login</label><span> *</span>
                <input type="text" name="login" maxlength="20" value="{{old('login')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Nome</label><span> *</span>
                <input type="text" name="nome" maxlength="15" value="{{old('nome')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Sobrenome</label><span> *</span>
                <input type="text" name="sobrenome" maxlength="30" value="{{old('sobrenome')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>E-mail</label><span> *</span>
                <input type="email" name="email" maxlength="50" value="{{old('email')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Adicione uma conta</label><span> *</span>
                <select name="instituicao">
                    <option>Selecione</option>
                    <option value="mibank">MiBank</option>
                    <option value="picpay">PicPay</option>
                    <option value="inter">Banco Inter</option>
                    <option value="nubank">Nubank</option>
                </select>
                <input type="text" name="conta" maxlength="30" placeholder="Sua conta..." value="{{old('conta')}}">
                <div style="display: none" class="controle">
                    <div class="container-agencia">
                        <input type="text" name="agencia" maxlength="4" placeholder="Agência" value="{{old('agencia')}}">
                    </div>
                    <div class="container-conta">
                        <input type="text" name="conta" maxlength="8" placeholder="Conta" value="{{old('conta')}}">
                    </div>
                </div>
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Celular</label>
                <input type="text" name="celular" maxlength="15" placeholder="(__) _____-____" value="{{old('celular')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Senha</label><span> *</span>
                <input type="password" name="password" maxlength="60" value="{{old('password')}}">
                <div class="notifica-campos"></div>
            </div>
            <div class="cada-form">
                <label>Confirmar senha</label><span> *</span>
                <input type="password" id="confirma-senha" maxlength="60">
                <div class="notifica-campos"></div>
            </div>
            <div style="margin: 0 30%">
                <button id="btn-cadastrar"> Criar Conta</button>
            </div>
        </form>
    </div>
@endsection