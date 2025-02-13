<script src="//unpkg.com/alpinejs" defer></script>
<div class="m-2" x-data="{ showToast: false, message: '' }">
    {{--    Submit prevent because I want to override the submit button to use my own logic down in the java--}}
    <form @submit.prevent="submitForm" method="POST" action="{{ route('ingredient.store') }}">
        @csrf
        <div class="space-y-6">
            <div class="border-b border-gray-900/10 pb-2">
                <h2 class="text-base/7 font-semibold text-gray-900">Add ingredient to database</h2>
            </div>

            <div class="border-b border-gray-900/10 pb-2">
                <div class="grid grid-cols-1">
                    <div class="col-span-full">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" x-ref="name"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="measurement" class="block text-sm/6 font-medium text-gray-900">Measurement</label>
                        <div class="mt-2">
                            <input type="text" name="measurement" id="measurement" x-ref="measurement"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="defaultQuantity" class="block text-sm/6 font-medium text-gray-900">Default Quantity</label>
                        <div class="mt-2">
                            <input type="text" name="defaultQuantity" id="defaultQuantity" x-ref="defaultQuantity"
                                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Save
            </button>
        </div>
    </form>


    <div x-data="{ showToast: false, message ='' }" id="toaster" class="col-span-1">
        <!-- Content to Show/Hide -->
        <div x-show="showToast" class="mt-4 p-4 bg-gray-100 rounded-lg shadow-md transition-opacity duration-300">
            <span>Ingredient saved successful!</span>
        </div>
    </div>


</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		function submitForm() {
			fetch("{{ route('ingredient.store') }}", {
				method: "POST",
				headers: {
					"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					name: document.getElementById('name').value,
					measurement: document.getElementById('measurement').value,
					defaultQuantity: document.getElementById('defaultQuantity').value,
				}),
			})
				.then(response => response.json())
				.then(data => {
					showModal(data.message);
				})
				.catch(error => {
					console.log(error);
					showModal("Something went wrong!");
				});
		}
		function showModal() {
			// Access the Alpine component via the id and its `x-data`
            const alpineComp = document.querySelector("#toaster")._x_dataStack[0];
			alpineComp.showToast = true;
			alpineComp.message = 'Ingredient saved successful!'
			setTimeout(()=>{
				alpineComp.showToast = false;
            }, 3000)
		}


		window.submitForm = submitForm;
	});
</script>