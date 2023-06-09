@props(['heading'])

<section class="py-6 max-w-6xl container mx-auto">
    <h1 class="text-lg font-bold mb-2 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <main class=" flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
