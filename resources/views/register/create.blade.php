<x-layout>
    <section class="px-0 py-0 justify-between flex flex-row ">
        <main class="max-w-xl mx-auto mt-10  m-0">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register!</h1>

                <form method="POST" action="/register" class="mt-2">
                    @csrf

                    <input name="book_slug" type="hidden" value="{{ request()->get('book-slug') }}">
                    </input>

                    <x-form.input name="name" required />
                    <x-form.input name="username" required />
                    <x-form.input name="email" type="email" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <x-form.input name="confirm password" type="password" autocomplete="confirm-new-password"
                        required />
                    <x-form.button>Register</x-form.button>
                </form>
            </x-panel>
        </main>

        <main class="max-w-xl mx-auto mt-10  m-0">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form method="POST" action="/login" class="mt-2">
                    @csrf

                    <input name="book_slug" type="hidden" value="{{ request()->get('book-slug') }}">
                    </input>

                    <x-form.input name="email" type="email" autocomplete="username" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
