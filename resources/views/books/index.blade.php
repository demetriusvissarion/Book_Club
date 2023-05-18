<x-layout>
    @include ('books._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($books->count())
            <x-books-grid :books="$books" />

            {{ $books->links() }}
        @else
            <p class="text-center">No books yet. Please check back later</p>
        @endif

    </main>
</x-layout>
