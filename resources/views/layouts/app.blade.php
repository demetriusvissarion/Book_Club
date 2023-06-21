<x-layout>
    <x-setting heading="Admin Dashboard">
        <div class="flex flex-row">
            <x-links />
            <livewire:user-management />
            {{-- @livewire('user-management') --}}
        </div>
    </x-setting>
</x-layout>
