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
                    <form method="POST" action="{{ route('estoque.adicionar') }}">
                        @csrf
                        <div class="flex flex-wrap">
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="idSKU" :value="__('SKU do Produto')" />
                                <x-input id="idSKU" class="block mt-1 w-full" type="text" name="idSKU" :value="old('idSKU')" required autofocus />
                            </div>
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="nomeProduto" :value="__('Nome do Produto')" />
                                <x-input id="nomeProduto" class="block mt-1 w-full" type="text" name="nomeProduto" :value="old('nomeProduto')" maxlength="255" required />
                            </div>
                            <div class="mt-4 w-1/2 md:inline-block px-1">
                                <x-label for="qntProduto" :value="__('Quantidade')" />
                                <x-input id="qntProduto" class="block mt-1 w-full" type="number" name="qntProduto" :value="old('qntProduto')" min="0" required />
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Adicionar Produto') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
