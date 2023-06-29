<x-layout>
    {{-- "include" was here --}}
    <main class="max-w-10xl mx-auto mt-0 lg:mt-0 space-y-6 flex flex-row">
        <div>
            @include ('books._header')
        </div>
        <div>
            @if ($books->count())
                <x-books-grid :books="$books" />

                {{ $books->links() }}
            @else
                <p class="text-center">No books yet. Please check back later</p>
            @endif
        </div>
    </main>
</x-layout>
