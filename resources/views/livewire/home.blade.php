@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                @livewireStyles

                {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

                {{-- <div class="p-6">
                    @if (session()->has('message'))
                        <div>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div> --}}

                {{-- <div class="p-6">
                    @if (session()->has('message'))
                        <div x-data="{ show: true }" x-show="show" @flash.window="show = true; setTimeout(() => show = false, 1000);"
                            class="fixed bottom-0 right-0 bg-green-500 text-white p-2 mb-4 mr-4 rounded">
                            session()->get('message')
                        </div>
                    @endif
                </div> --}}

                @livewire('users')

                @livewireScripts

                {{-- <script>
                    function flash(message) {
                        window.dispatchEvent(new CustomEvent('flash', {
                            detail: {
                                message
                            }
                        }))
                    }
                </script> --}}


            </div>
        </x-setting>
    </x-layout>
@endadmin
