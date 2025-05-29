@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'bg-green-100 border-l-4 border-green-600 text-green-600 font-bold p-3']) }}>
        {{ $status }}
    </div>
@endif
