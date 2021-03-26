<!DOCTYPE html>
<html>
    <head>
        <title> Livre Doações - @yield('subtitulo')</title>
        <meta name="theme-color" content="#1E88E5">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{--##################### css ####################### --}}
        <link rel="stylesheet" href="{{asset('css/template/office.css')}}"/>

        {{--################## fonts e icons ####################--}}
        <link rel="icon" href="{{asset('css/icon/ld.ico')}}">
        <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

        {{--############### Script ######################--}}
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('js/templates/template-office-home.js')}}"></script>
        @yield('head')
    </head>
    <body>
        <div class="header">
            <div class="div-titilo">
                <a href="{{route('office.index')}}">Livre Doações</a>
            </div>
            <div class="div-titilo-right">
                <nav>
                    @php
                        $nome = Auth::user()->nome.' '.Auth::user()->sobrenome;
                    @endphp
                    <p>Olá, {{$nome}}</p>
                    <a href='{{route('office.logout')}}'>Terminar Sessão<i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </nav>
            </div>
        </div>

        <ul class="notifica-user" data-status="{{session('status')}}" style="display: none">
            @if(!empty(session('resposta')))
                @if( is_array(session('resposta') ))
                    @foreach(session('resposta') as $cada_mensagem)
                        <li>{{$cada_mensagem}}</li>
                    @endforeach
                @else
                    <li>{{session('resposta')}}</li>
                @endif
            @endif
        </ul>
        @php
            $admin =  \App\Models\Acesso\Usuario::find(Auth::id())->admin;
        @endphp
        <div class="bar-lateral">
            <a @if(Route::currentRouteName() == 'office.index')  class="ativo" @endif
                href="{{route('office.index')}}"><i class="fa fa-home" aria-hidden="true"></i>Início</a>
            <a @if(Route::currentRouteName() == 'office.doacao')  class="ativo" @endif
                href="{{route('office.doacao')}}"><i class="fa fa-money" aria-hidden="true"></i>Fazer doação</a>
            <a @if(Route::currentRouteName() == 'office.relatorio')  class="ativo" @endif
                href="{{route('office.relatorio')}}"><i class="fa fa-line-chart" aria-hidden="true"></i>Relatório</a>
            <a @if(Route::currentRouteName() == 'office.configuracoes')  class="ativo" @endif
                href="{{route('office.configuracoes')}}"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</a>
            <a @if(Route::currentRouteName() == 'office.suporte')  class="ativo" @endif
            href="{{route('office.suporte')}}"><i class="fa fa-comments-o" aria-hidden="true"></i>Suporte</a>
            @if( isset($admin->tipo) )
                <div class="inline">Administrador</div>
                @if( $admin->tipo == 'Super' )
                    <a @if(Route::currentRouteName() == 'admin.super')  class="ativo" @endif href="{{route('admin.super')}}">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>Super</a>
                @else
                <a @if(Route::currentRouteName() == 'admin.admin')  class="ativo" @endif href="{{route('admin.admin')}}">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>Config. Admin</a>
                @endif
            @endif
        </div>
        <div class="body-content">
            @yield('body')
        </div>
    </body>
</html>