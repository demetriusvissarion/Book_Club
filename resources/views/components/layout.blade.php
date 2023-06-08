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
                            </x-form.button>
                        </x-slot>

                        @admin
                            <x-dropdown-item href="/admin/books" :active="request()->is('admin/books')">Admin Dashboard
                            </x-dropdown-item>

                            <x-dropdown-item href="admin/users/{{ auth()->user()->id }}/edit" :active="request()->is('users/{{ auth()->user()->id }}/edit')">My Account
                            </x-dropdown-item>

                            <x-dropdown-item href="/admin/books/create" :active="request()->is('admin/books/create')">New Book
                            </x-dropdown-item>
                        @endadmin

                        @users
                            <x-dropdown-item href="admin/users/{{ auth()->user()->id }}/edit" :active="request()->is('users/{{ auth()->user()->id }}/edit')">My Account
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
                        class="ml-6 text-xl font-bold uppercase bg-blue-500 text-white py-2 px-10 rounded-2xl hover:bg-blue-600">Register
                        / Login</a>
                @endauth

            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter"
            class=" bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-1 px-1 mt-0">
            <h5 class="text-2xl">Stay in touch with the latest books</h5>
        </footer>
    </section>

    <x-flash />

</body>
