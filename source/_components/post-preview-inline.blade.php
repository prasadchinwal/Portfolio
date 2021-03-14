<section class="body-font dark:hover:bg-white dark:hover:text-gray-800 hover:shadow-lg rounded-md overflow-hidden">
    <div class="container p-5 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                    <span class="font-semibold title-font text-indigo-400">{{ implode(',', $post->categories) }} </span>
                    <span class="mt-1 text-sm">{{ $post->getDate()->format('F j, Y') }}</span>
                </div>
                <div class="md:flex-grow">
                    <h2 class="text-2xl font-medium title-font mb-2">
                        <a href="{{ $post->getUrl() }}"
                            title="Read more - {{ $post->title }}"
                            class="font-extrabold"
                        >{{ $post->title }}</a>
                    </h2>
                    <p class="leading-relaxed">{!! $post->getExcerpt(200) !!}</p>
                    <a href="{{ $post->getUrl() }}"
                        title="Read more - {{ $post->title }}"
                        class="flex p-2 items-center justify-center rounded-md bg-gray-600 text-white hover:bg-gray-800"
                    >Read</a>
                </div>
            </div>
        </div>
    </div>
</section>