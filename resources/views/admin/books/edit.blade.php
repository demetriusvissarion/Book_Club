<x-layout>
    <x-setting :heading="'Edit Book: ' . $book->title">
        <form method="POST" action="/admin/books/{{ $book->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $book->title)" required />
            <x-form.input name="slug" :value="old('slug', $book->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $book->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="" class="rounded-xl ml-6"
                    width="50">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $book->excerpt) }}</x-form.textarea>
            {{--            <x-form.textarea name="body" required>{{ old('body', $book->body) }}</x-form.textarea> --}}

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
