<x-layout>

    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form action="/admin/posts" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Title</label>
                    <input
                        name="title"
                        type="text"
                        class="border border-gray-400 p-2 w-full">

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Excerpt</label>
                    <textarea name="excerpt" required class="border border-gray-400 p-2 w-full"></textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Post Body</label>
                    <textarea name="body" required class="border border-gray-400 p-2 w-full"></textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Category</label>

                    <select name="category_id">

                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Publish
                </button>
            </form>
        </x-panel>
    </section>

</x-layout>
