<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All your recipes') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-6">
        @foreach($recipes as $recipe)
            <a href="{{ route('recipe.show', $recipe) }}" >
                <x-block-card class="hover:bg-gray-50 hover:border-gray-300">
                    <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{ $recipe->description }}</p>
                </x-block-card>
            </a>
        @endforeach
    </div>

</x-app-layout>