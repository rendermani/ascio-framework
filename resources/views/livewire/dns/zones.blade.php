<div>
    <x-jet-form-section  submit="create">
        <x-slot name="title">
            {{ __('Zones') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Create zones.') }}
        </x-slot>

        <x-slot name="form">
           
        </x-slot>
    </x-jet-form-section>
    <x-jet-section-border />
    <div class="mt-10 sm:mt-0">
            <x-jet-action-section>
                <x-slot name="title">
                    {{ __('Manage Zones') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit and delete zones. Please use edit to view and edit records') }}
                </x-slot>

                <!-- Zone Token List -->
                <x-slot name="content">
                    <div class="space-y-6">
                         @foreach ($zones as $zone)
                            <div class="flex items-center justify-between">
                                <div>
                                    {{ $zone->ZoneName }}
                                </div>

                                <div class="flex items-center">
                                        <div class="text-sm text-gray-400">
                                            {{$zone->Owner}}
                                        </div>
                                        <div class="text-sm text-gray-400 ml-6">
                                            {{$zone->_client}}
                                        </div>
                                        <div class="text-sm text-gray-400 ml-6">
                                            {{$zone->CreatedDate}}
                                        </div>

                                        <a href="dns/zone/'{{ $zone->ZoneName }}">
                                            {{ __('Edit Records') }}
                                        </a>

                                        <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="delete('{{ $zone->ZoneName }}')">
                                             {{ __('Delete') }}
                                        </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>
            </x-jet-action-section>
            <div>test {{ $test }}  </div>
            {{ $zones->links() }}

</div>