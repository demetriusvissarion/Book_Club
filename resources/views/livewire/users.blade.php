<div>
    <div>
        @include('livewire.create')
        @include('livewire.update')
        @if (session()->has('message'))
            <div class="bg-green-500 text-white mt-6 p-4 rounded">
                {{ session('message') }}
            </div>
        @endif
        <table class="border-collapse mt-5">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    {{-- <th class="px-4 py-2">Email</th> --}}
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $value)
                    <tr>
                        <td class="px-4 py-2">{{ $value->id }}</td>
                        <td class="px-4 py-2">{{ $value->name }}</td>
                        {{-- <td class="px-4 py-2">{{ $value->email }}</td> --}}
                        <td class="flex flex-row px-4 py-2">
                            <button wire:click="edit({{ $value->id }})"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $value->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
