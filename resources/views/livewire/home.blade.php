@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                @livewireStyles


                <div class="p-6">
                    @if (session()->has('message'))
                        <div class="bg-green-500 text-white mb-4 p-4 rounded">
                            {{ session('message') }}
                        </div>
                    @endif
                    @livewire('users')
                </div>

                @livewireScripts

            </div>

            {{-- Pagination --}}
            {{-- <div>
                {{ $users->links('pagination::tailwind') }}
            </div> --}}
        </x-setting>
    </x-layout>
@endadmin
