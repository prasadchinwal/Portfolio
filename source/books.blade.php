---
title: Books
description: My favorite books
---
@extends('_layouts.master')
@section('body')
    <div class="py-5">
        <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-300 to-purple-400">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </span>
        </div>

        <div class="my-6">
            <h2 class="inline px-2 py-1 rounded-lg text-4xl font-extrabold tracking-tight bg-gradient-to-r from-blue-400 to-indigo-500 text-white">
            Currently Reading
            </h2>
        </div>

        <section class="border-b-2 border-gray-900 py-2">
            @foreach($books->where('current-read', true) as $currentRead)
                @include('_components.currently-reading')
            @endforeach
        </section>

        <div class="mt-6">
            <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">
            Some of my favorite Books!
            </h2>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        @foreach($books as $book)
            @include('_components.book')
        @endforeach
    </div>
@endsection
