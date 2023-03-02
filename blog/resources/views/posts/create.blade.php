<x-layout>

    <section class="max-w-md mx-auto py-8">

        <h1 class="text-lg font-bold mb-4">
            Publish new post
        </h1>

        <x-panel>
            <form action="/admin/posts" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Title</label>
                    <input
                        name="title"
                        type="text"
                        value="{{ old('title') }}"
                        class="border border-gray-400 p-2 w-full">

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Excerpt</label>
                    <textarea name="excerpt" required class="border border-gray-400 p-2 w-full">{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Post Body</label>
                    <textarea name="body" required class="border border-gray-400 p-2 w-full">{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Slug</label>
                    <input
                        name="slug"
                        type="text"
                        value="{{ old('slug') }}"
                        class="border border-gray-400 p-2 w-full">

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Thumbnail</label>
                    <input
                        name="thumbnail"
                        type="file"
                        value="{{ old('title') }}"
                        class="border border-gray-400 p-2 w-full">

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block mb-2 font-bold text-xs text-gray-700 uppercase">Category</label>

                    <select name="category_id">

                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}">
                                {{ old('$category_id') == $category->id ? 'selected' : '' }}
                                {{ ucwords($category->name) }}
                            </option>
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
