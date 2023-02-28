@auth()
    <x-panel>
        <form action="/post/{{ $post->slug }}/comments/" method="POST">
            @method('GET')
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40px" height="40px" class="rounded-full">
                <h2 class="ml-3">Want to participate</h2>
            </header>

            <div class="mt-7">
                <textarea required rows="5" placeholder="Quick, think of something to say" name="body" id="" cols="30" class="w-full focus:outline-none focus:ring"></textarea>

                @error('body')
                <span class="text-xs text-red"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <button class="bg-blue-500 text-white text-uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" type="submit">Post</button>
            </div>

        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a class="underlined" href="/register">Register</a> or <a class="underlined" href="/login">login</a> to leave a comment
    </p>
@endauth
