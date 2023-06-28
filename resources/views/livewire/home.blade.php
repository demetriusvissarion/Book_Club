@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                @livewireStyles

                <div>
                    <div>
                        <div class="flex justify-center">
                            <div>
                                <div class="bg-white rounded-lg shadow">
                                    <div class="p-6">
                                        @if (session()->has('message'))
                                            <div class="bg-green-500 text-white mb-4 p-4 rounded">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        @livewire('users')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewireScripts

                    {{-- <script type="text/javascript">
                    window.livewire.on('userStore', () => {
                        $('#exampleModal').modal('hide');
                    });
                </script> --}}
                </div>

            </div>

            {{-- Pagination --}}
            {{-- <div>
                {{ $users->links('pagination::tailwind') }}
            </div> --}}
        </x-setting>
    </x-layout>
@endadmin
