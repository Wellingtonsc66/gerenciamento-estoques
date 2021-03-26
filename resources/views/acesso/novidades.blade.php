@extends('templates.template')
@section('subtitulo', 'Novidades')
@section('head')
    <link rel="stylesheet" href="{{asset('css/acesso/news-info.css')}}"/>
@endsection

@section('body')
    <div class="content-news">
        <div>
            <p>
                Todas novidades, coisas novas por vim na livre doações será publicado aqui.
            </p>
            <p>
                Em breve todas as páginas da livre doações seram responsivas para telas de smartphones, ou
                seja todas paginas seram adaptadas para a tela de seu celular.
            </p>
            <p>
                Visando ter mais opcoes de livre escolhas dos participantes, esteremos adicionando opcao de doções
                atravez do picpay e se bem aceita sera adionado a opcao de doacao atravez do banco intermedium.
            </p>
        </div>
    </div>
@endsection