<div class="m-6">
    <form
            method="POST"
            action="{{ route('ingredient.store') }}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Add ingredient to database</h2>
            </div>

            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-2 grid grid-cols-1">
                    <div class="col-span-full">
                        <label
                                for="title"
                                class="block text-sm/6 font-medium text-gray-900">Name
                        </label>
                        <div class="mt-1">
                            <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                                for="measurement"
                                class="block text-sm/6 font-medium text-gray-900">Measurement
                        </label>
                        <div class="mt-2">
                            <input
                                    type="text"
                                    name="measurement"
                                    id="measurement"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label
                                for="defaultQuantity"
                                class="block text-sm/6 font-medium text-gray-900">defaultQuantity
                        </label>
                        <div class="mt-2">
                            <input
                                    name="defaultQuantity"
                                    id="defaultQuantity"
                                    rows="3"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></input>
                        </div>
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

