<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!$relatorio)
                        <div class="b-promo">
                            <h3 class="no-atrr">Não há movimentações por hoje.</h3>
                            As movimentações de produtos serão listados aqui.
                        </div>
                    @else
                        <table class="table-p">
                            <thead>
                            <tr>
                                <td colspan="5">MOVIMENTAÇÕES DA DATA {{date('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>USUÁRIO</td>
                                <td>SKU ID</td>
                                <td>NOME DO PRODUTO</td>
                                <td>QUANTIDADE</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($relatorio as $key=>$cada_prod)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$cada_prod['name']}}</td>
                                    <td>{{$cada_prod['skuId']}}</td>
                                    <td>{{$cada_prod['produto_nome']}}</td>
                                    <td>{{$cada_prod['produto_data_qnt']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
