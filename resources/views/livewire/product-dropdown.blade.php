<div class="mt-3">
    <div class="font-semibold mb-1">
        {{ Str::title($variations->first()?->type) }}
    </div>

    {{ $selectedVariation }}

    <x-select class="w-full" wire:model="selectedVariation">
        <option value="">Choose an option</option>

        @foreach($variations as $variation)
            <option value="{{ $variation->id  }}">
                {{ $variation->title }}
            </option>
        @endforeach
    </x-select>
</div>
