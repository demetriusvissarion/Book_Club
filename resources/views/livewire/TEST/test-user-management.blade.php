@admin
    <x-layout>
        <x-setting heading="Admin Dashboard">
            <div class="flex flex-row">
                <x-links />

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div id="main-container" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            {{-- <livewire:create-user /> --}}
                            {{-- <livewire:update-user /> --}}
                            @livewire('create-user')
                            @livewire('update-user')

                            @if (session()->has('message'))
                                <div class="alert alert-success mt-8">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="pl-6 text-left text-uppercase text-secondary text-xxs font-bold opacity-7">
                                            Name
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-bold opacity-7">
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
                                                <button wire:click="edit({{ $user->id }})"
                                                    onclick="return confirm('{{ __('Do you want to edit this user? (test)') }}')"
                                                    class="text-blue-500 hover:text-blue-600">Edit</button>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button wire:click="delete({{ $user->id }})"
                                                    onclick="return confirm('{{ __('Are you sure you want to delete this user? It will be permanent.') }}')"
                                                    class="text-red-500 hover:text-red-600">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- New User Modal --}}
                        <button wire:click="openModal('user-management-modal')"
                            class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Create New
                            User</button>

                    </div>
                </div>
            </div>
        </x-setting>
    </x-layout>
@endadmin
