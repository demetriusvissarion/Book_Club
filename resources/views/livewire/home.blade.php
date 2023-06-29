@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                @livewireStyles

                {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

                <div class="p-6">
                    @if (session()->has('message'))
                        <div>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>

                @livewire('users')

                @livewireScripts


            </div>
        </x-setting>
    </x-layout>
@endadmin
