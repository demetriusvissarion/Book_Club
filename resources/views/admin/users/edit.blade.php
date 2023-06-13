<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Account details</h1>

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="mt-10">
                    @csrf
                    @method('PUT')

                    <x-form.input name="name" required :value="$user->name" />
                    <x-form.input name="username" required :value="$user->username" />
                    <x-form.input name="email" type="email" required :value="$user->email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" required />
                    <x-form.input name="confirm_password" type="password" autocomplete="confirm-new-password"
                        required />
                    <x-form.button>Save and Exit</x-form.button>
                </form>

                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mt-2"
                        onclick="return confirm('{{ __('Are you sure you want to delete your account? It will be permanent.') }}')">
                        Delete Account</button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
