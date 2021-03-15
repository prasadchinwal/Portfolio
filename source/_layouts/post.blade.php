@extends('_layouts.master')

@php
    $page->type = 'article';
@endphp
@section('stylesheets')
<style>
    .markdown-body {
        box-sizing: border-box;
        min-width: 200px;
        max-width: 980px;
        margin: 0 auto;
        padding: 45px;
    }

    @media (max-width: 767px) {
        .markdown-body {
            padding: 15px;
        }
    }
    .markdown-body > pre > code {
        padding-bottom: 1rem;
        padding-top: 1rem;
        margin-bottom: 1rem;
        margin-top: 1rem;
        border-radius: 0.5rem;
    }
</style>
@endsection
@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" title="{{ $page->title }} cover image"
            alt="{{ $page->title }} cover image" class="w-full h-64 bg-cover bg-center mb-2"
        >
    @endif

    <span class="text-2xl font-semibold leading-none mb-2">{{ $page->title }}</span>

    <p class="text-indigo-400 text-xl md:mt-0">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-gray-300 hover:bg-blue-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>
        @endforeach
    @endif

    <div class="markdown-body border-b border-blue-200 mb-10 py-4" v-pre>
        @yield('content')
    </div>

    <nav class="py-4 flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}"
                class="inline-flex items-center md:mb-2 lg:mb-0 bg-yellow-300 text-gray-600 hover:text-gray-800 rounded-lg py-1 px-2"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}"
                    class="inline-flex items-center md:mb-2 lg:mb-0 bg-yellow-300 text-gray-600 hover:text-gray-800 rounded-lg py-1 px-2"
                >
                    {{ $previous->title }}
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @endif
        </div>
    </nav>
@endsection
