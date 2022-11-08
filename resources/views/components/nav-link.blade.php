@props(['active'])

@if ($active)
    <span class="absolute inset-y-0 left-0 w-1 bg-caret rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
@endif
<a
    {{ $attributes->merge([
        'class' =>
            'inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 text-text hover:text-main',
    ]) }}>

    @if ($active)
        <div class="text-main">
            {{ $icon ?? '' }}
        </div>
        <span class="ml-4 text-main">{{ $slot }}</span>
    @else
        {{ $icon ?? '' }}
        <span class="ml-4">{{ $slot }}</span>
    @endif
</a>
