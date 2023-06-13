<x-layout>
    <main class="max-w-lg mx-auto mt-10 mb-6">
        <h1 class="font-bold text-xl">Edit Category</h1>

        <form method="POST" action="/admin/categories/create" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name" required />
            <x-form.input name="slug" required />

            <x-form.button>Create</x-form.button>
        </form>
    </main>
</x-layout>
