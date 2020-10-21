<div class="flex items-center justify-between">
    <div>
        {{ $zone->ZoneName }}
    </div>

    <div class="flex items-center">
            <div class="text-sm text-gray-400">
                {{$zone->Owner}}
            </div>
            <div class="text-sm text-gray-400 ml-6">
                {{$zone->DbAttributes->_client}}
            </div>
            <div class="text-sm text-gray-400 ml-6">
                {{$zone->CreatedDate}}
            </div>

            <button class="cursor-pointer ml-6 text-sm text-gray-400 underline focus:outline-none" wire:click="edit('{{ $zone->ZoneName }}')">
                {{ __('Edit Records') }}
            </button>

            <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="delete('{{ $zone->ZoneName }}')">
                    {{ __('Delete') }}
            </button>
    </div>
</div>