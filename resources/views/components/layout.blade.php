<!doctype html>

<title>Book CLub</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-0">
        <nav class="md:flex md:justify-between md:items-center bg-blue-300 pr-20 sticky top-0">
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="Book Club Logo" class="w-32 h-full">
                </a>
            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="/">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif

                    <input type="text" name="search" placeholder="Type text + hit Enter"
                        class="bg-transparent placeholder-gray-500 placeholder-opacity-50 font-semibold text-sm"
                        value="{{ request('search') }}">
                </form>
            </div>

            <div class="mt-2 md:mt-0 flex items-center">
                @auth
                    <x-dropdown class="flex-row">
                        <x-slot name="trigger">
                            <x-form.button class="text-xs font-bold uppercase">
                                {{ auth()->user()->name }}
                                {{-- TODO: add "(admin)" after the name if the user is admin --}}
                                {{-- @php
                                $logged_user_name = auth()->user()->name;
                                if($logged_user_name == "Demetrius Vissarion") {
                                    echo $logged_user_name . " (admin)"
                                    } else {echo $logged_user_name;}
                            @endphp --}}
                            </x-form.button>
                        </x-slot>

                        @admin
                            <x-dropdown-item href="/admin/books" :active="request()->is('admin/books')">Admin Dashboard
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/books/create" :active="request()->is('account')">Account
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/books/create" :active="request()->is('admin/books/create')">New Book
                            </x-dropdown-item>
                        @endadmin

                        @users
                            <x-dropdown-item href="/admin/books/create" :active="request()->is('account')">Account
                            </x-dropdown-item>
                            <x-dropdown-item href="/books/create" :active="request()->is('books/create')">New Book
                            </x-dropdown-item>
                        @endusers

                        <x-dropdown-item href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()">Log Out
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register"
                        class="ml-6 text-xl font-bold uppercase bg-blue-500 text-white py-2 px-10 rounded-2xl hover:bg-blue-600">Register</a>
                    <a href="/login"
                        class="ml-6 text-xl font-bold uppercase bg-blue-500 text-white py-2 px-10 rounded-2xl hover:bg-blue-600">Log
                        In</a>
                @endauth

                {{--            <a href="#newsletter" --}}
                {{--               class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5"> --}}
                {{--                Subscribe for Updates --}}
                {{--            </a> --}}
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class=" bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-1 px-1 mt-0">
            {{--        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;"> --}}
            <h5 class="text-2xl">Stay in touch with the latest books</h5>
            {{-- <p class="text-sm mt-1">Promise to keep the inbox clean. No bugs.</p>  --}}

            {{-- <div class="mt-2"> --}}
            {{-- <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full"> --}}

            {{-- <form method="POST" action="/newsletter" class="lg:flex text-sm"> --}}
            {{-- @csrf --}}

            {{--
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-2 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                          --}}
            {{-- </form> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </footer>
    </section>

    <x-flash />

</body>
