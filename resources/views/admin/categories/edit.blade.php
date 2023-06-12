<x-layout>
    <main class="max-w-lg mx-auto mt-10">
        <h1 class="font-bold text-xl">Edit Category</h1>

        <form method="POST" action="/admin/category/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('slug', $category->slug)" required />

            <x-form.button>Update</x-form.button>
        </form>
    </main>
</x-layout>
