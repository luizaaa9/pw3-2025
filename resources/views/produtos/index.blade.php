<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-link-button href="{{ route('produtos.create') }}">
                        + Produto
                </x-link-button>

                <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-4">Lista de Produtos</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @forelse ($produtos as $produto)
                                <div class="border rounded-lg p-4 bg-gray-100 dark:bg-gray-700">
                                    @if ($produto->imagem)
                                        <img 
                                            src="{{ asset('storage/' . $produto->imagem) }}" 
                                            alt="{{ $produto->nome }}" 
                                            class="w-full h-48 object-cover mb-4 rounded-lg"
                                        >
                                    @else
                                        <div class="w-full h-48 bg-gray-300 dark:bg-gray-600 flex items-center justify-center rounded-lg">
                                            <span class="text-gray-500 dark:text-gray-400">Sem imagem</span>
                                        </div>
                                    @endif

                                    <h4 class="font-bold text-lg">{{ $produto->nome }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $produto->descricao }}</p>
                                    <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                    </p>

                                    <div class="flex space-x-4 mt-4">
                                        <x-link-button href="{{ route('produtos.edit', $produto) }}" class="bg-blue-500 text-white">
                                            Editar
                                        </x-link-button>

                                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                            @csrf
                                            @method('DELETE')
                                            <x-link-button type="submit" class="bg-red-500 text-white">
                                                Excluir
                                            </x-link-button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400">Nenhum produto encontrado.</p>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
