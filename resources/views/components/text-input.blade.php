@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-600 text-grey-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
