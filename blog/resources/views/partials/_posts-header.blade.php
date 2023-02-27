<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg"
                                                       alt="Head of Lary the mascot"></h2>

    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing the popular Laravel series with new content.
        I'm going to keep you guys up to speed with what's going on!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->

        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

            <x-post.drop-down >

                <x-slot:trigger>
                    <button
                        class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

                        {{ (isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories') }}

                       <x-icon.icon
                           name="icon-svg-right"
                           style="right: 12px;"
                           class="absolute pointer-events-none" />
                    </button>
                </x-slot:trigger>

                <x-post.drop-down-item
                    :active="request()->routeIs('home')"
                    href="/">
                    All
                </x-post.drop-down-item>

                @foreach($categories as $category)

                    <x-post.drop-down-item
                        {{--:active="isset($currentCategory) && $currentCategory->is($category)"--}}
                        :active="request()->is('categories/' . $category->slug)"
                        href="/?category={{ $category->slug }}">
                        {{ ucwords($category->name) }}
                    </x-post.drop-down-item>

                @endforeach
            </x-post.drop-down>

        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input
                    type="text"
                    name="search"
                    placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>
