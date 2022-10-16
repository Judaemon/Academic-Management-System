@props(['active'])

@if($active)
    <span
        class="absolute inset-y-0 left-0 w-1 bg-iscp_secondary rounded-tr-lg rounded-br-lg"
        aria-hidden="true"
    ></span>
@endif
<a {{ $attributes->merge(['class' => 'inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 hover:text-my_secondary']) }}>
    {{ $icon ?? '' }}
    <span class="ml-4">{{ $slot }}</span>
</a>
