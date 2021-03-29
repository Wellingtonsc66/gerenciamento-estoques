<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adicionar Novo Produto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-session-status class="mb-4" :status="session('status')"/>
                    <form method="POST" action="{{ route('estoque.adicionar') }}">
                        @csrf
                        @if(!empty(session('msg_error')))
                            @if( is_array(session('msg_error') ))
                                @foreach(session('msg_error') as $cada_mensagem)
                                    <li style="color: red">{{$cada_mensagem}}</li>
                                @endforeach
                            @else
                                <li style="color: red">{{session('msg_error')}}</li>
                            @endif
                        @endif
                        <div class="flex items-center justify-start mt-4">
                            <x-button type="button" onclick="alterCard()" id="toggle">
                                {{ __('Alternar Editar') }}
                            </x-button>
                        </div>
                        <div class="flex flex-wrap hidden" id="edit">
                            <div style="width: 100%;" class="mt-4 md:inline-block px-1">
                                <x-label for="produto_id" :value="__('Produto a Editar')" />
                                <select id="produto_id" size="4" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="produto_id" required>
                                    @foreach($produtos as $key=>$cada_prod)
                                        <option value="{{$cada_prod['produto_id']}}">{{'Quantidade em estoque: '.$cada_prod['produto_qnt'].' :: Produto: '.$cada_prod['produto_nome']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="produto_qnt" :value="__('Quantidade a Adicionar')" />
                                <x-input id="produto_qnt" class="block mt-1 w-full" type="number" name="produto_qnt" :value="old('produto_qnt')" min="1" required />
                            </div>
                        </div>
                        <div class="flex flex-wrap" id="add">
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="skuId" :value="__('SKU do Produto')" />
                                <x-input id="skuId" class="block mt-1 w-full" type="text" name="skuId" :value="old('skuId')" required autofocus />
                            </div>
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="produto_nome" :value="__('Nome do Produto')" />
                                <x-input id="produto_nome" class="block mt-1 w-full" type="text" name="produto_nome" :value="old('produto_nome')" maxlength="255" required />
                            </div>
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="produto_qnt" :value="__('Quantidade')" />
                                <x-input id="produto_qnt" class="block mt-1 w-full" type="number" name="produto_qnt" :value="old('produto_qnt')" min="1" required />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4" id="btn-save">
                                {{ __('Adicionar Produto') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function alterCard() {
        if ($('#edit').is(':visible')) {
            $('#toggle').text('ALTERNAR EDITAR');
            $('#btn-save').text('ADICIONAR PRODUTO');
            $('#add').slideDown().find('input, select').prop('disabled', false);
            $('#edit').slideUp().find('input, select').prop('disabled', true);
        } else {
            $('#toggle').text('ALTERNAR ADICIONAR');
            $('#btn-save').text('EDITAR PRODUTO');
            $('#add').slideUp().find('input, select').prop('disabled', true);
            $('#edit').slideDown().find('input, select').prop('disabled', false);
        }
    }
</script>
