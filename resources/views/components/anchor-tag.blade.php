@props(['active' => false])
<a {{$attributes}} class="{{ $active ? "": "" }} px-3 py-2 border-2 border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:text-gray-900 hover:border-recipeOrange" aria-current="page">{{$slot}}</a>

