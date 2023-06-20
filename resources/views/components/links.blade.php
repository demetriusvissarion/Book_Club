<aside class="w-60 flex-shrink-0">
    <h4 class="font-semibold mb-4">Links</h4>

    <ul>
        <li>
            <a href="/admin/adminBooks"
                class="{{ request()->is('admin/adminBooks') ? 'bg-blue-500 text-white' : '' }}">Books
                Management</a>
        </li>

        <li>
            <a href="/admin/categories"
                class="{{ request()->is('admin/categories') ? 'bg-blue-500 text-white' : '' }}">Categories
                Management</a>
        </li>

        <li>
            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'bg-blue-500 text-white' : '' }}">Users
                Management</a>
        </li>


        <li>
            <a href="/admin/users2" class="{{ request()->is('admin/users2') ? 'bg-blue-500 text-white' : '' }}">Users
                Management 2</a>
        </li>
    </ul>
</aside>
