@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div id="main-container"
                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg modal-open:hidden">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="pl-6 text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Books Uploaded
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex items-center text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex items-center text-sm font-medium text-gray-900">
                                                        <p>{{ $user->getUploadedBooksCount() }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="text-blue-500 hover:text-blue-600"
                                                    class="block text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Edit</a>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-xs text-gray-400"
                                                        onclick="return confirm('{{ __('Are you sure you want to delete this user? It will be permanent.') }}')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- New User --}}
                        {{-- <form method="GET" action="/admin/users/create" enctype="multipart/form-data">
                            @csrf

                            <x-form.button type="submit" class="text-xs font-bold uppercase ml-4">
                                Add New User
                            </x-form.button>
                        </form> --}}

                        {{-- New User Modal --}}
                        <button onclick="Livewire.emit('openModal', 'user-management-modal')">Open Modal</button>
                        {{-- <button wire:click="$emit('openModal', 'user-management-modal')">Open Modal</button> --}}
                        {{-- <button x-on:click="isOpen = !isOpen">Open Modal</button> --}}

                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="mt-4 flex justify-center">
                Showing:
                <div class="ml-2">
                    <span class="mr-2">{{ $users->firstItem() }}</span>
                    <span class="mr-2">to</span>
                    <span class="mr-2">{{ $users->lastItem() }}</span>
                    <span class="mr-2">of</span>
                    <span class="mr-2">{{ $users->total() }}</span>
                    <span class="mr-2">users</span>
                </div>
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        @foreach ($users->onEachSide(1)->links()->elements as $element)
                            @foreach ($element as $page => $url)
                                <li class="mr-1" style="display: inline-block;">
                                    @if ($page === $users->currentPage())
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
@endadmin
