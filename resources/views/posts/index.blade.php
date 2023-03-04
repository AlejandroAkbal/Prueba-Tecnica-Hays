<x-guest-layout>
    <main>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">

                <div class="bg-white px-4 py-2 shadow-xl rounded-lg">
                    <h1 class="text-3xl font-bold">Posts</h1>

                    <ul class="mt-4 space-y-4">
                        @foreach ($posts as $post)

                            <li class="w-full overflow-hidden">
                                <a href="{{ route('posts.show', $post['id']) }}"
                                   class="text-xl font-semibold capitalize">
                                    <h2>
                                        {{ $post['title'] }}
                                    </h2>
                                </a>

                                <p class="text-gray-600 line-clamp-1">{{ $post['body'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

</x-guest-layout>
