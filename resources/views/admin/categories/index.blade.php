<x-layout>
    <x-setting heading="Admin Dashboard" class="mt-0">
        <div class="flex flex-row">
            <x-links />

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="pl-6 text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category Name
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex items-center text-sm font-medium text-gray-900">
                                                    {{-- <p class="mr-5">Category Name:</p> --}}
                                                    <a href="/admin/categories">
                                                        {{ $category->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/categories/{{ $category->id }}/edit"
                                                class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/categories/{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-xs text-gray-400"
                                                    onclick="return confirm('{{ __('Are you sure you want to delete this category? It will be permanent.') }}')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- New Category --}}
                    <form method="GET" action="/admin/categories/create" enctype="multipart/form-data">
                        @csrf

                        <x-form.button type="submit" class="text-xs font-bold uppercase ml-4">
                            Add New Category
                        </x-form.button>
                    </form>
                </div>
            </div>


        </div>

        {{-- Pagination --}}
        <div class="mt-4 flex justify-center">
            Showing:
            <div class="ml-2">
                <span class="mr-2">{{ $categories->firstItem() }}</span>
                <span class="mr-2">to</span>
                <span class="mr-2">{{ $categories->lastItem() }}</span>
                <span class="mr-2">of</span>
                <span class="mr-2">{{ $categories->total() }}</span>
                <span class="mr-2">categories</span>
            </div>
            <nav role="navigation" aria-label="Pagination Navigation">
                <ul class="pagination">
                    @foreach ($categories->onEachSide(1)->links()->elements as $element)
                        @foreach ($element as $page => $url)
                            <li class="mr-1" style="display: inline-block;">
                                @if ($page === $categories->currentPage())
                                    <span
                                        class="bg-blue-500 text-white px-4 py-2 rounded-full">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="text-blue-500 hover:text-blue-600 px-4 py-2 rounded-full">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </nav>
        </div>

    </x-setting>
</x-layout>
