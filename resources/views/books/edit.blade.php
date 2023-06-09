<x-layout>
    <div class="hidden lg:flex mb-0 ml-80 mt-2">
        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                </path>
            </g>
        </svg>
        <button type="button" onclick="javascript:history.back()" class="z-0">Back to Book</button>
    </div>


    <x-setting :heading="'Edit Book: ' . $book->title">
        <form method="POST" action="/books/{{ $book->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $book->title)" required />
            <x-form.input name="slug" :value="old('slug', $book->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $book->thumbnail)" />
                </div>

                <div class="flex-1">
                    <x-form.input name="pdf" type="file" :value="old('pdf', $book->pdf)" />
                </div>

                <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="book thumbnail" class="rounded-xl ml-6"
                    width="50">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $book->excerpt) }}</x-form.textarea>

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
