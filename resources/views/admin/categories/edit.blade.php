<x-layout>
    <main class="max-w-lg mx-auto mt-10 mb-6">
        <div class="hidden lg:flex mb-2">
            <a href="/admin/categories"
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

                <p class="z-0">Back to Categories</p>
            </a>

        </div>

        <h1 class="font-bold text-xl">Edit Category</h1>
        <form method="POST" action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-form.input name="name" :value="old('name', $category->name)" required />
            <x-form.input name="slug" :value="old('slug', $category->slug)" required />

            <x-form.button>Update</x-form.button>
        </form>
    </main>
</x-layout>
