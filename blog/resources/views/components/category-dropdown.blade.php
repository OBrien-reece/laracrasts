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
            :active="request()->is('categories/' . $category->slug)"
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}">
            {{ ucwords($category->name) }}
        </x-post.drop-down-item>

    @endforeach
</x-post.drop-down>
