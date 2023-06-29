<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <div class="hidden lg:flex mb-2">
                <a href="/admin/users"
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

                    <p class="z-0">Back to Users</p>
                </a>

            </div>

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
