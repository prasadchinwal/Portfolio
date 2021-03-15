---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.master')

@section('body')

    <h2 class="text-3xl sm:text-5xl leading-none uppercase font-extrabold text-purple-600 tracking-tight mb-8">Blog</h2>

    <p class="sm:text-md sm:leading-snug font-semibold tracking-wide text-gray-900 dark:text-gray-200 mb-3">Here are my learnings which I try to share with everyone via blog posts!</p>

    <hr class="border-b my-6">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="bg-indigo-100 hover:bg-indigo-400 text-indigo-800 hover:text-yellow-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-indigo-100 hover:bg-indigo-400 text-indigo-800 hover:text-yellow-400 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : 'text-indigo-600' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="bg-indigo-100 hover:bg-indigo-400 text-indigo-800 hover:text-yellow-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop
