<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 gap-4 m-6">
        <div class="col-span-4">
            <div class="m-6">
                <form
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
{{--        <button wire:click="$set('show', true)">Show component 1</button--}}

        <div class="col-span-1 ">
            @include('ingredients.create')
        </div>
    </div>

</x-app-layout>