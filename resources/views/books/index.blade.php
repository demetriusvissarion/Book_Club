<x-layout>
    {{-- "include" was here --}}
    <main class="max-w-6xl mx-auto mt-0 lg:mt-0 space-y-6">
        @include ('books._header')
        @if ($books->count())
            <x-books-grid :books="$books" />

            {{ $books->links() }}

            {{-- Pagination
            <div class="mt-4 flex justify-center">
                Showing:
                <div class="ml-2">
                    <span class="mr-2">{{ $books->firstItem() }}</span>
                    <span class="mr-2">to</span>
                    <span class="mr-2">{{ $books->lastItem() }}</span>
                    <span class="mr-2">of</span>
                    <span class="mr-2">{{ $books->total() }}</span>
                    <span class="mr-2">users</span>
                </div>
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        @foreach ($books->onEachSide(1)->links()->elements as $element)
                            @foreach ($element as $page => $url)
                                <li class="mr-1" style="display: inline-block;">
                                    @if ($page === $books->currentPage())
                                        <span
                                            class="bg-blue-500 text-white px-4 py-2 rounded-full">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}"
                                            class="text-blue-500 hover:text-blue-600 px-4 py-2 rounded-full">{{ $page }}</a>
                                    @endif
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </nav>
            </div> --}}
        @else
            <p class="text-center">No books yet. Please check back later</p>
        @endif

    </main>
</x-layout>
