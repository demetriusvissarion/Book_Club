@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/uploads"
                       class="{{ request()->is('admin/uploads') ? 'text-blue-500' : '' }}">Book Upload Validation</a>
                </li>

                <li>
                    <a href="/admin/categories"
                       class="{{ request()->is('admin/categories') ? 'text-blue-500' : '' }}">Book Categories</a>
                </li>

                <li>
                    <a href="/admin/users"
                       class="{{ request()->is('admin/users') ? 'text-blue-500' : '' }}">Users Management</a>
                </li>
            </ul>
        </aside>

        <main class=" flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
