<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-lg overflow-hidden aspect-square w-full flex justify-center border border-gray-100'])}}>
    <div class="p-4 text-center">
        {{ $slot }}
    </div>
</div>
