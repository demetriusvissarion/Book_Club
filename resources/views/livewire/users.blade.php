<div>
    <div class="mb-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div class="bg-green-500 text-white mt-6 p-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        {{-- Search --}}
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input wire:model="search" id="search"
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                placeholder="Search" type="search">
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    {{-- <th class="px-4 py-2">ID</th> --}}

                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortby('name')" class="font-bold">Name</button>
                            <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                        </div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">
                            <button wire:click="sortby('email')" class="font-bold">Email</button>
                            <x-sort-icon field="email" :sortField="$sortField" :sortAsc="$sortAsc" />
                        </div>
                    </th>

                    <th class="px-4 py-2">Uploads</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->getUploadedBooksCount() }}</td>
                        <td class="flex flex-row px-4 py-2">
                            @if ($user->id !== 1)
                                <button wire:click="edit({{ $user->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                <button wire:click="delete({{ $user->id }})"
                                    onclick="confirm('Are you sure you want to remove the user? This is permanent and irreversible!') || event.stopImmediatePropagation()"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('livewire.update', $user)

    @include('livewire.create')

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
                                <span class="bg-blue-500 text-white px-4 py-2 rounded-full">{{ $page }}</span>
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
</div>
