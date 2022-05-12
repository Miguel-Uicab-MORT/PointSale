<div class="flex items-center" x-data>
    <button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled" wire:target="removeItem"
        wire:click="removeItem">
        <strong class="text-3xl ">
            -
        </strong>
    </button>

    <span class="mx-2">
        <strong>
            {{ $qty }}
        </strong>
    </span>

    <button wire:loading.attr="disabled" wire:target="removeItem" wire:click="addItem">
        <strong class="text-xl ">
            +
        </strong>
    </button>
</div>
