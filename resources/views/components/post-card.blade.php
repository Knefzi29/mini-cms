@props(['post'])

<article class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
    <h3 class="text-xl font-semibold">
        <a href="{{ route('posts.show', $post->slug) }}" class="hover:underline">
            {{ $post->title }}
        </a>
    </h3>

    <p class="mt-2 text-gray-600">
        {{ \Illuminate\Support\Str::limit($post->body, 120) }}
    </p>
</article>