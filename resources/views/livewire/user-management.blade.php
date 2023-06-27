@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div id="main-container" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            {{-- Update User Modal --}}
                            {{-- @livewire('update-user') --}}

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

                                            <td class="px-1 py-1 whitespace-nowrap text-right text-sm font-medium">
                                                {{-- Edit User Modal --}}
                                                <div class="mt-0">
                                                    @livewire('update-user')
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button wire:click="delete({{ $user->id }})"
                                                    class="text-red-500 hover:text-red-600">Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Create New User Modal --}}
                        <div class="mt-6">
                            @livewire('create-user')
                        </div>



                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div>
                {{-- {{ $users->links() }} --}}
                {{ $users->links('pagination::tailwind') }}
            </div>

            @livewireScripts
        </x-setting>
    </x-layout>
@endadmin
