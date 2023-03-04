<x-guest-layout>
    <main>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold">Posts</h1>

                    <ul class="mt-4 space-y-4">
                        @foreach ($posts as $post)

                            <li>
                                <a href="{{ route('posts.show', $post['id']) }}"
                                   class="text-xl font-semibold capitalize">
                                    {{ $post['title'] }}
                                </a>

                                <p class="text-gray-600 max-h-6 overflow-hidden truncate">{{ $post['body'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>

</x-guest-layout>
