@extends('_layouts.master')

@section('body')
    @foreach ($posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">
            @if ($featuredPost->cover_image)
                <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
            @endif

            <p class="text-gray-700 dark:text-white font-medium my-2">
                {{ $featuredPost->getDate()->format('F j, Y') }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 dark:text-white font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

            <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase mb-4 inline-block p-2 rounded-md bg-gray-600 text-white dark:hover:bg-white dark:hover:text-gray-800">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    <div class="py-2 border-t-2 border-gray-800 dark:border-white">
        @foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
            @foreach ($row as $post)
                @include('_components.post-preview-inline')

                @if (! $loop->last)
                    <hr class="block md:hidden w-full border-b mt-2 mb-6">
                @endif
            @endforeach
            @if (! $loop->last)
                <hr class="w-full border-b mt-2 mb-6">
            @endif
        @endforeach
    </div>
@stop
