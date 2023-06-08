<x-layout>
    <x-setting heading="Admin: Publish New Book">
        <form method="POST" action="/admin/books" enctype="multipart/form-data">
            @csrf

            <x-form.field>
                <x-form.label name="author" />

                <select name="user_id" id="user_id" required>
                    @foreach (\App\Models\User::all() as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ ucwords($user->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="user_id" />
            </x-form.field>

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
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
                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Publish Book</x-form.button>
        </form>
    </x-setting>
</x-layout>
