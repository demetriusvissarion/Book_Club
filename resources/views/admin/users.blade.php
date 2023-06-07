<x-layout>
    <x-setting heading="Manage Books">
        <div class="flex flex-row">
            <aside class="w-60 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>

                <ul>
                    <li>
                        <a href="/admin/books"
                            class="{{ request()->is('admin/books') ? 'bg-blue-500 text-white' : '' }}">Books
                            Management</a>
                    </li>

                    <li>
                        <a href="/admin/categories"
                            class="{{ request()->is('admin/categories') ? 'bg-blue-500 text-white' : '' }}">Categories
                            Management</a>
                    </li>

                    <li>
                        <a href="/admin/users"
                            class="{{ request()->is('admin/users') ? 'bg-blue-500 text-white' : '' }}">Users
                            Management</a>
                    </li>
                </ul>
            </aside>

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex items-center text-sm font-medium text-gray-900">
                                                    <p class="mr-5">User Name:</p>
                                                    <a href="/admin/users">
                                                        {{ $user->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex items-center text-sm font-medium text-gray-900">
                                                    <p class="mr-5">No. of Books Uploaded:</p>
                                                    <p>{{ $user->getUploadedBooksCount() }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            {{-- <a href="/admin/users/{{ $user->id }}/edit"
                                                class="text-blue-500 hover:text-blue-600"
                                                class="block text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Edit</a> --}}
                                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                                class="text-blue-500 hover:text-blue-600" type="button">
                                                Edit
                                            </button>

                                            <!-- Main modal -->
                                            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-2xl max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <!-- Modal header -->
                                                        <div
                                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                            <h3
                                                                class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                Terms of Service
                                                            </h3>
                                                            <button type="button"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="defaultModal">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="p-6 space-y-6">
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                With less than a month to go before the European Union
                                                                enacts new consumer privacy laws for its citizens,
                                                                companies around the world are updating their terms of
                                                                service agreements to comply.
                                                            </p>
                                                            <p
                                                                class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                                The European Union’s General Data Protection Regulation
                                                                (G.D.P.R.)
                                                                goes into effect on May 25 and is meant to
                                                                ensure a common set of data rights in the European
                                                                Union. It requires organizations to notify users as soon
                                                                as possible of high-risk data breaches that could
                                                                personally affect them.
                                                            </p>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div
                                                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                            <button data-modal-hide="defaultModal" type="button"
                                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                                accept</button>
                                                            <button data-modal-hide="defaultModal" type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/users/{{ $user->id }}">
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
                </div>
            </div>
        </div>

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

        <script src="{{ asset('js/flowbite.js') }}"></script>

    </x-setting>
</x-layout>
