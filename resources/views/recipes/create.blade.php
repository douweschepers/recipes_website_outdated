<x-app-layout>
    <script src="//unpkg.com/alpinejs" defer></script>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4 m-6">
        <div class="col-span-4">
            <div class="m-6">
                <form
                        id="create-recipe-form"
                        method="POST"
                        action="{{ route('recipe.store') }}">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base/7 font-semibold text-gray-900">New recipe</h2>

                            {{--                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">--}}



                            {{--                        <div class="col-span-full">--}}
                            {{--                            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Foto of recipe</label>--}}
                            {{--                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">--}}
                            {{--                                <div class="text-center">--}}
                            {{--                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon">--}}
                            {{--                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />--}}
                            {{--                                    </svg>--}}
                            {{--                                    <div class="mt-4 flex text-sm/6 text-gray-600">--}}
                            {{--                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-indigo-500">--}}
                            {{--                                            <span>Upload a file</span>--}}
                            {{--                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">--}}
                            {{--                                        </label>--}}
                            {{--                                        <p class="pl-1">or drag and drop</p>--}}
                            {{--                                    </div>--}}
                            {{--                                    <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                        </div>

                        <div class="border-b border-gray-900/10 pb-12">

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="col-span-full">
                                    <label
                                            for="title"
                                            class="block text-sm/6 font-medium text-gray-900">Title
                                    </label>
                                    <div class="mt-2">
                                        <input
                                                type="text"
                                                name="title"
                                                id="title"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                <div class="col-span-full">
                                    <label
                                            for="description"
                                            class="block text-sm/6 font-medium text-gray-900">Description
                                    </label>
                                    <div class="mt-2">
                                        <input
                                                type="text"
                                                name="description"
                                                id="description"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    </div>
                                </div>

                                {{-- fetch all the available in the ingredients from db, limit to 10 and make clickable --}}
                                <div id="ingredient-list" class="space-y-2 col-span-full">
                                    @foreach($ingredients as $ingredient)
                                        <div class="ingredient-item flex items-center justify-between p-4 border border-gray-300 rounded-md cursor-pointer transition-all duration-200 hover:bg-gray-200"
                                             onclick="toggleSelection(this, {{$ingredient}})">

                                            <!-- Ingredient Name & Measurement -->
                                            <span class="ingredient-name font-semibold">
                                                {{ $ingredient->name }} ({{ $ingredient->measurement }})
                                            </span>
                                            <!-- Editable Quantity Input -->
                                            <label>
                                                <input type="number" value="{{ $ingredient->default_quantity }}"
                                                       class="default-quantity w-16 p-1 border rounded-md text-center"
                                                       onchange="updateQuantity(this, {{ $ingredient }})">
                                            </label>
                                        </div>
                                    @endforeach
                                </div>


                                <div class="col-span-full">
                                    <label
                                            for="instructions"
                                            class="block text-sm/6 font-medium text-gray-900">Instructions
                                    </label>
                                    <div class="mt-2">
                                        <textarea
                                                name="instructions"
                                                id="instructions"
                                                rows="3"
                                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                                    </div>
                                    <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about how to make this.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button
                                type="button"
                                class="text-sm/6 font-semibold text-gray-900">Cancel
                        </button>
                        <button
                                type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div x-data="{ isVisible: false }" class="col-span-1 transition-opacity duration-300">
            <!-- Toggle Button -->
            <button
                    @click="isVisible = !isVisible"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition"
            >
                <span x-show="!isVisible">Create ingredient</span>
                <span x-show="isVisible">Hide</span>
            </button>

            <!-- Content to Show/Hide -->
            <div x-show="isVisible" class="mt-4 p-4 bg-gray-100 rounded-lg shadow-md transition-opacity duration-300">
                @include('ingredients.create')
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    let selectedIngredients = [];

    function toggleSelection(element, ingredient) {
	    element.classList.toggle('bg-green-500');
	    // element.classList.toggle('text-white');
	    let id = ingredient.id;
		let quantity = ingredient.default_quantity

	    if (element.classList.contains('bg-green-500')) {
		    // Add ingredient to the array
		    selectedIngredients.push({ id , quantity });
	    } else {
		    // Remove ingredient from the array
		    selectedIngredients = selectedIngredients.filter(ingredient => ingredient.id !== id);
	    }
	    console.log(selectedIngredients); // Debugging output
    }

    function updateQuantity(element, ingredient) {
	    let updatedQuantity = Number(element.value);
	    selectedIngredients = selectedIngredients.map(ing =>
		    ing.id === ingredient.id ? {
			    ...ing,
			    quantity: updatedQuantity
		    } : ing
	    );

	    console.log(selectedIngredients);
    }
    document.querySelector('#create-recipe-form').addEventListener('submit', (e) => {
	    e.preventDefault();
	    let formData = new FormData(document.querySelector('#create-recipe-form'))

        console.log(JSON.stringify(selectedIngredients));

	    formData.append( 'ingredients', JSON.stringify(selectedIngredients));

        console.log("form data:" + JSON.stringify(formData));
	    fetch('http://localhost:8080/recipe', {
		    method: 'POST',
		    headers: {
			    'Accept': 'application/json',  // Adjust based on expected response
			    '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		    },
            	    body: formData
	    })
		    .then(response => {
			    if (!response.ok) {
				    // If response is not ok, handle the error (maybe a redirect)
				    return response.text().then(text => {
					    throw new Error(text);  // This will log the HTML content (likely a redirect page)
				    });
			    }

			    window.location.href = "{{ route('recipes.index') }}";

			    // return response.json();  // Proceed with JSON if the response is okay
            })
		    .then(data => console.log(data))
		    .catch(error => console.log('Error:', error ));

	    {{--fetch("{{ route('douwe') }}", {--}}
		{{--	    method: "GET",--}}
		{{--	    headers: {--}}
		{{--		    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,--}}
		{{--		    "Content-Type": "application/json",--}}
		{{--	    },--}}
		{{--	    // body: formData--}}
        {{--            // JSON.stringify({--}}
		{{--		    // title: document.getElementById('title').value,--}}
		{{--		    // description: document.getElementById('description').value,--}}
		{{--		    // instructions: document.getElementById('instructions').value,--}}
		{{--		    // ingredients: selectedIngredients--}}
		{{--	    // }),--}}
		{{--    })--}}
		{{--	    .then(response => {--}}
		{{--		    if (!response.ok) {--}}
		{{--				console.log(response.text());--}}
		{{--			    throw new Error("HTTP status " + response.status);--}}
		{{--		    }--}}
		{{--		    return response.json();--}}
		{{--	    })--}}
		{{--	    .then(data => {--}}
		{{--		    console.log("Recipe saved:", data);--}}
		{{--	    })--}}
		{{--	    .catch(error => {--}}
		{{--		    console.error("Error:", error);--}}
		{{--	    });--}}


	    window.submitForm = submitForm;
    });

    {{--document.addEventListener('DOMContentLoaded', function () {--}}
	{{--    function submitForm () {--}}
	{{--	    fetch("{{ route('recipe.store') }}", {--}}
	{{--		    method: "POST",--}}
	{{--		    headers: {--}}
	{{--			    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,--}}
	{{--			    "Content-Type": "application/json",--}}
	{{--		    },--}}
	{{--		    // body: JSON.stringify({--}}
	{{--			//     name: document.getElementById('title').value,--}}
	{{--			//     measurement: document.getElementById('description').value,--}}
	{{--			//     defaultQuantity: document.getElementById('instructions').value,--}}
    {{--            //     ingredients: selectedIngredients--}}
	{{--		    // }),--}}
	{{--		    body: JSON.stringify({--}}
	{{--			    title: document.getElementById('title').value,--}}
	{{--			    description: document.getElementById('description').value,--}}
	{{--			    instructions: document.getElementById('instructions').value,--}}
	{{--			    ingredients: selectedIngredients--}}
	{{--		    }),--}}

	{{--	    })--}}
	{{--		    .then(response => {--}}
	{{--			    if (!response.ok) {--}}
	{{--				    throw new Error("HTTP status " + response.status);--}}
	{{--			    }--}}
	{{--				console.log("now it should save the ingredients part 1")--}}
	{{--			    return response.json();--}}
    {{--            })--}}
	{{--		    .then(data => {--}}

	{{--				console.log("now it should save the ingredients")--}}
	{{--		    })--}}
	{{--		    .catch(error => {--}}
	{{--			    console.log(error);--}}
	{{--			    showModal("Something went wrong!");--}}
	{{--		    });--}}
	{{--    }--}}
	{{--    window.submitForm = submitForm;--}}
    {{--});--}}
</script>