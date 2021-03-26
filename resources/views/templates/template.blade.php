<!DOCTYPE html>
<html>
    <head>
        <title> Livre Doações - @yield('subtitulo')</title>
        <meta name="theme-color" content="#1E88E5">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{--##################### css ####################### --}}
        <link rel="stylesheet" href="{{asset('css/template/template-inicio.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/acesso/form.css')}}"/>

        {{--################## fonts e icons ####################--}}
        <link rel="icon" href="{{asset('css/icon/ld.ico')}}">
        <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">

        {{--############### Script ######################--}}
        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/jquery.mask.min.js')}}"></script>
        <script src="{{asset('js/templates/template-home.js')}}"></script>
        @yield('head')
    </head>
    <body>
        <div class="header">
            <div class="div-titilo">
                <a href="{{route('index')}}">Livre Doações</a>
            </div>
            <div class="div-titilo-right">
                <nav>
                    <a @if(Route::currentRouteName() == 'index')  class="ativo" @endif
                        href="{{route('index')}}">Login</a>
                    <a @if(Route::currentRouteName() == 'cadastrar')  class="ativo" @endif
                        href="{{route('cadastrar')}}">Cadastrar</a>
                    <a @if(Route::currentRouteName() == 'novidades')  class="ativo" @endif
                        href="{{route('novidades')}}">Novidades</a>
                    <a @if(Route::currentRouteName() == 'sobre')  class="ativo" @endif
                        href="{{route('sobre')}}">Sobre</a>
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
                @php session()->forget(['resposta', 'status']) @endphp
            @endif
        </ul>

        <div class="body-content">
            @yield('body')
        </div>

    </body>
</html>


