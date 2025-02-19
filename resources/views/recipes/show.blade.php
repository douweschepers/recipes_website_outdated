<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $recipe->title }}
        </h2>
    </x-slot>
    <div class="justify-left m-6">
        <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
        <p class="text-gray-600 text-sm mt-2">{{ $recipe->description }}</p>

        <p class="text-gray-600 text-sm mt-2"> {{$recipe->instructions}}</p>
        <br>

        <h3 class="text-gray-800 font-bold mt-2"> Aantal personen: </h3>
        <h2>Ingredients:</h2>
        @foreach($recipe->ingredients as $ingredient)
                <p class="col-span-1 text-gray-600 text-sm mt-2"> {{ $ingredient->name }} {{$ingredient->pivot->quantity}}  {{ $ingredient->measurement }} </p>
        @endforeach
    </div>
</x-app-layout>