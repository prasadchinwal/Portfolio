@extends('_layouts.master')

@section('body')
    <section class="text-black py-5">
        <div class="lg:grid lg:grid-cols-12 lg:gap-8">
            <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                <h1 class="font-roboto block text-4xl sm:text-5xl xl:text-5xl font-extrabold tracking-loose mb-4">
                    Hey, I'm Prasad!
                </h1>
                <div class="text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                    <span>
                        <strong>Full Stack Developer</strong> by day and
                        <strong>Gamer</strong> by night.
                    </span>

                    <p>Currently employed at
                        <a href="https://uis.edu" title="University of Illinois, Springfield Website"
                            target="_blank" rel="noreferrer"
                            class="py-1 px-2 rounded-lg bg-purple-200 text-purple-700 no-underline font-semibold"
                        >
                            <span>University of Illinois, Springfield.</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="py-5 mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                <div class="relative mx-auto w-full rounded-lg shadow-lg lg:max-w-md">
                    <div class="relative block w-full bg-yellow-200 rounded-lg overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <img class="bg-center w-full h-64" src="/assets/images/be-a-hero.svg" alt="terraform autoscale group">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-5 border-t-2">
        <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-300 to-purple-400">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            </span>
        </div>
        <div class="mt-6">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                Featured Post:
            </h2>
        </div>
    </div>
    @foreach ($posts->where('featured', true) as $featuredPost)
        <div class="w-full mb-6">

            <p class="text-gray-700 font-medium my-2">
                {{ $featuredPost->getDate()->format('F j, Y') }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="text-gray-900 font-extrabold">
                    {{ $featuredPost->title }}
                </a>
            </h2>

            <p class="leading-relaxed mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

            <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="uppercase mb-4 inline-block p-2 rounded-md bg-gray-600 text-white">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    <div class="py-2 border-t-2 border-gray-800">
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
