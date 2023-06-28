<div>
    <div class="mb-6 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

        @if (session()->has('message'))
            <div class="bg-green-500 text-white mt-6 p-4 rounded">
                {{ session('message') }}
            </div>
        @endif
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Uploads</th>
                    {{-- <th class="px-4 py-2">Email</th> --}}
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->getUploadedBooksCount() }}</td>
                        {{-- <td class="px-4 py-2">{{ $user->email }}</td> --}}
                        <td class="flex flex-row px-4 py-2">
                            <button wire:click="edit({{ $user->id }})"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $user->id }})"
                                onclick="confirm('Are you sure you want to remove the user? This is permanent and irreversible!') || event.stopImmediatePropagation()"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('livewire.update', $user)

    @include('livewire.create')

    {{-- Pagination --}}
    {{-- <div>
        {{ $users->links('pagination::tailwind') }}
    </div> --}}
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
