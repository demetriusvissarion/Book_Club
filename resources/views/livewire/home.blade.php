@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                @livewireStyles

                @livewire('users')

                @livewireScripts
            </div>
        </x-setting>
    </x-layout>
@endadmin
