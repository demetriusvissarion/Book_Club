<x-layout>
    <section class="px-0 py-0 justify-between flex flex-row ">
        <main class="max-w-xl mx-auto mt-10  m-0">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Create New user</h1>

                <form method="POST" action="/admin/users" class="mt-2">
                    @csrf

                    <x-form.input name="name" required />
                    <x-form.input name="username" required />
                    <x-form.input name="email" type="email" required />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <x-form.input name="confirm password" type="password" autocomplete="confirm-new-password"
                        required />
                    <x-form.button>Submit</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
