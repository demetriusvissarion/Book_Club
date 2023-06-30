<x-layout>
    <div class="hidden lg:flex mb-0 ml-80 mt-2">
        <a href="/"
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
            <p class="z-0">Back to Books</p>
        </a>
    </div>

    <x-setting heading="Create New Book">
        <form method="POST" action="/books" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            {{-- <x-form.input name="slug" required /> --}}
            <x-form.input name="thumbnail" type="file" required />
            <x-form.input name="pdf" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
