<x-guest-layout>
    <main>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl">

                <article class="bg-white px-4 py-2 shadow-xl rounded-lg">
                    <h1 class="text-2xl font-medium capitalize">
                        {{ $post['title'] }}
                    </h1>

                    <p class="text-gray-600 mt-2">
                        {{ $post['body'] }}
                    </p>

                    {{-- Author --}}
                    <section class="flex gap-4 items-center pt-4">
                        <img src="https://ui-avatars.com/api/?name={{ $author['name'] }}" alt="avatar"
                             class="w-10 h-10 rounded-full">

                        <div>
                            <h2 class="text-gray-600">Author</h2>
                            <p class="text-gray-900 font-medium">{{ $author['name'] }}</p>
                        </div>
                    </section>
                </article>
            </div>
        </div>
    </main>

</x-guest-layout>
