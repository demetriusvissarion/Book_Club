<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-2 lg:mt-2 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Book Thumbnail" class="rounded-xl">

                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex mb-2">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500 z-0">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            <p class="z-0">Back to Books</p>
                        </a>

                    </div>

                    <div class="space-x-2 mb-2 flex flex-row align-middle">
                        <h1 class="font-bold text-3xl lg:text-4xl mb-2 ml-0">
                            {{ $book->title }}
                        </h1>
                    </div>

                    <p class="mt-4 mb-2 block text-gray-400 text-xs">
                        Published
                        <time>{{ $book->created_at->diffForHumans() }}</time>
                    </p>


                    <div class="space-x-2 mb-2">
                        <strong>Category:</strong>
                        <x-category-button :category="$book->category" />
                    </div>

                    <div class="flex items-center text-sm mt-4 mb-2">
                        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt=""
                            class="rounded-full h-10 w-10 object-cover">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $book->author->username }}">{{ $book->author->name }}</a>
                            </h5>
                        </div>
                    </div>

                    <strong>Description:</strong>
                    <div class="text-sm mt-4 space-y-4">
                        {!! $book->excerpt !!}
                    </div>

                    <div class="mt-4">
                        @guests
                        <a href="/register?book-slug={{ $book->slug }}"
                            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mt-4">Download
                            PDF (requires login)</a>
                        @endguests

                        @users
                            <a href="download"
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mt-4">Download
                                PDF</a>
                            @if ($book->user_id === \Auth::user()->id)
                                <div class="align-items-center">
                                    <a href="/books/{{ $book->id }}/edit"
                                        class="btn btn-warning bg-yellow-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-yellow-600 mt-4"
                                        style="font-size: 10px">Edit</a>
                                    <form method="post" action="{{ route('books.userDestroy', $book) }}"
                                        style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            onclick="return confirm('{{ __('Are you sure you want to delete this book? It will be permanent.') }}')"
                                            class="btn btn-danger bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mt-4"
                                            style="font-size: 10px">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            @endif
                        @endusers

                        @admin
                            <a href="download"
                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mt-4">Download
                                PDF</a>
                            <div class="align-items-center">
                                <a href="/books/{{ $book->id }}/edit"
                                    class="btn btn-warning bg-yellow-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-yellow-600 mt-4"
                                    style="font-size: 10px">Edit</a>
                                <form method="post" action="{{ route('books.userDestroy', $book) }}"
                                    style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        onclick="return confirm('{{ __('Are you sure you want to delete this book? It will be permanent.') }}')"
                                        class="btn btn-danger bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mt-4"
                                        style="font-size: 10px">{{ __('Delete') }}</button>
                                </form>
                            </div>
                        @endadmin

                    </div>

                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    @include ('books._add-comment-form')

                    @foreach ($book->comments as $comment)
                        <x-book-comment :comment="$comment" />
                    @endforeach
                </section>
            </article>
        </main>
    </section>
</x-layout>
