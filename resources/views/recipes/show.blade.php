<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>
    <div class="justify-left m-6">
        <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
        <p class="text-gray-600 text-sm mt-2">{{ $recipe->description }}</p>
        <p class="text-gray-600 text-sm mt-2"> these are the ingredients</p>
        <p class="text-gray-600 text-sm mt-2">here are some instructions...</p>

    </div>
</x-app-layout>