<header class="max-w-4xl mt-1 text-left sticky top-8">
    <nav class="space-y-2 lg:space-y-0 lg:space-x-4 mt-2 max-w-4xl flex justify-items-end">
        <!--  Author & Category -->
        <div class="flex flex-row">
            <h1 class="text-2xl flex justify-end mb-2">
                Filter Books by:
            </h1>

            <div class="bg-gray-100 rounded-xl mb-2 ml-4 w-60">
                <x-author-dropdown />
            </div>

            <div class="bg-gray-100 rounded-xl mb-2 ml-4 w-60">
                <x-category-dropdown />
            </div>
        </div>



    </nav>
</header>
