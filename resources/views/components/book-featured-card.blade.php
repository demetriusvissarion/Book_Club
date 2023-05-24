@props(['book'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Blog Book illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    Category:
                    <x-category-button :category="$book->category"/>
                </div>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/books/{{ $book->slug }}">
                            {{ 'Title: ' . $book->title }}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $book->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>
            <div class="text-sm mt-2 space-y-4">
                {!! $book->excerpt !!}
            </div>
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/demetrius-avatar.jpg" alt="Demetrius avatar" class="object-scale-down h-10 w-10 rounded-full">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $book->author->username }}">{{ $book->author->name }}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/books/{{ $book->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                        {{--                       TODO: add check if logged in, if not redirect to login--}}
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
