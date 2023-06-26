<x-modal>
    <x-slot name="title">
        Create New user
    </x-slot>

    <x-slot name="content">
        <form method="POST" action="/admin/users2" class="mt-2">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="username" required />
            <x-form.input name="email" type="email" required />
            <x-form.input name="password" type="password" autocomplete="new-password" required />
            <x-form.input name="confirm password" type="password" autocomplete="confirm-new-password" required />
            <x-form.button>Submit</x-form.button>
        </form>
    </x-slot>

    <x-slot name="buttons">
        Buttons go here...
    </x-slot>

</x-modal>
