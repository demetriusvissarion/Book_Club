<x-layout>
    {{-- "include" was here --}}
    <main class="max-w-6xl mx-auto mt-0 lg:mt-0 space-y-6">
        @include ('books._header')
        @if ($books->count())
            <x-books-grid :books="$books" />

            {{ $books->links() }}
        @else
            <p class="text-center">No books yet. Please check back later</p>
        @endif

    </main>
</x-layout>
