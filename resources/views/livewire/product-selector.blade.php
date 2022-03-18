<div class="space-y-6">
   @if($initialVariation)
       <livewire:product-dropdown :variations="$initialVariation" />
   @endif

    <div class="space-y-6">
        @if($skuVariant)
            <div class="font-semibold text-lg">
                {{ $skuVariant->formattedPrice() }}
            </div>

            <x-button wire:click.prevent="addToCart">Add to cart</x-button>
        @endif
    </div>
</div>
