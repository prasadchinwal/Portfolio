<div class="flex flex-col hover:bg-gray-100 dark:hover:text-gray-800 rounded-lg p-4 mb-4">
    <p class="text-indigo-600 font-semibold my-2">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>
    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="flex p-2 items-center justify-center rounded-md bg-gray-600 text-white hover:bg-gray-800"
    >Read</a>
</div>