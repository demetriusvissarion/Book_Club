<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex ">
            {{ isset($currentUser) ? ucwords($currentUser->name) : 'Authors' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('user', 'page')) }}" :active="request()->routeIs('home') && is_null(request()->getQueryString())">
        All
    </x-dropdown-item>

    @foreach ($users as $user)
        <x-dropdown-item href="/?user={{ $user->username }}&{{ http_build_query(request()->except('user', 'page')) }}"
            :active='request()->fullUrlIs("*?user/{$user->username}")'>
            {{ ucwords($user->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
