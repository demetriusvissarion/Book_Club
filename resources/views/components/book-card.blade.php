@props(['book', 'books'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-2 px-2 h-full flex flex-col mt-0">
        <h1 class="text-2xl clamp one-line">
            <a href="/books/{{ $book->slug }}">
                <span class="text-xl">Title: </span>
                {{ $book->title }}
            </a>
        </h1>
        <div class="flex flex-row mt-3">
            <div>
                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Book card thumbnail" class="rounded-xl w-24">
            </div>

            <header class="mt-2 ml-5">
                <div class="space-x-2">
                    Category:
                    <x-category-button :category="$book->category" />
                </div>

                <div class="flex items-center text-sm">
                    By:
                    <div class="ml-3 mr-2">
                        <h5 class="font-bold">
                            <a href="/?author={{ $book->author->username }}">{{ $book->author->name }}</a>
                        </h5>
                    </div>
                    <img src="https://i.pravatar.cc/150?u={{ $book->user_id }}" alt=""
                        class="rounded-full h-10 w-10 object-cover">
                </div>

                <div class="mt-2">
                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $book->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>
        </div>
        <div class="mt-2 flex flex-col justify-between flex-1">
            <div class="text-sm mt-2 space-y-4">
                <p class="font-bold">Description:</p>
                {!! Illuminate\Support\Str::limit($book->excerpt, 90) !!}
            </div>
            <footer class="flex justify-between items-center mt-2">

                <div>
                    @if (Auth::id())
                        <a href="/books/{{ $book->slug }}"
                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read
                            More</a>
                    @else
                        <a href="/books/{{ $book->slug }}"
                            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 overflow-hidden overflow-ellipsis whitespace-nowrap">Read
                            More (requires login)</a>
                    @endif
                </div>
            </footer>
        </div>
    </div>
</article>
