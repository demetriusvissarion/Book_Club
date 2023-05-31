<header class="max-w-xl mt-1 text-left sticky top-8">
    <nav class="space-y-2 lg:space-y-0 lg:space-x-4 mt-2 max-w-4xl flex justify-items-end">
        <!--  Author & Category -->
        <div class="flex flex-row">
            <h1 class="text-4xl flex justify-end mb-2">
                Filter Books by:
            </h1>

            <div class="bg-gray-100 rounded-xl mb-2 ml-4">
                <x-author-dropdown />
            </div>

            <div class="bg-gray-100 rounded-xl mb-2 ml-4">
                <x-category-dropdown />
            </div>
        </div>


        <!-- Search -->
        {{--        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2"> --}}
        {{--            <form method="GET" action="/"> --}}
        {{--                @if (request('category')) --}}
        {{--                    <input type="hidden" name="category" value="{{ request('category') }}"> --}}
        {{--                @endif --}}

        {{--                <input type="text" --}}
        {{--                       name="search" --}}
        {{--                       placeholder="Find something" --}}
        {{--                       class="bg-transparent placeholder-black font-semibold text-sm" --}}
        {{--                       value="{{ request('search') }}" --}}
        {{--                > --}}
        {{--            </form> --}}
        {{--        </div> --}}
    </nav>
</header>
