<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        @yield('stylesheets')
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100 leading-normal font-sans">
        <header class="flex items-center shadow bg-white dark:bg-gray-800 border-b h-24 py-4" role="banner">
            <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex no-underline items-center">
                        <img class="h-8 md:h-10 mr-3" src="/assets/images/me.svg" alt="{{ $page->siteName }} logo" />

                        <h1 class="text-lg md:text-2xl text-blue-600 dark:text-white font-semibold hover:text-blue-800 my-0">{{ $page->siteName }}</h1>
                    </a>
                </div>

                <div id="vue-search" class="flex flex-1 bg-white dark:bg-gray-800 justify-end items-center">
                    <search></search>

                    @include('_nav.menu')

                    @include('_nav.menu-toggle')
                </div>
            </div>
        </header>

        @include('_nav.menu-responsive')

        <main role="main" class="flex-auto w-full container max-w-4xl mx-auto py-16 px-6">
            @yield('body')
        </main>

        <footer class="bg-white dark:bg-gray-800 dark:text-white border-t-2 border-white text-center text-sm mt-12 py-4" role="contentinfo">
            <div class="">
                <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                    <p class="text-gray-800 dark:text-gray-100 text-sm text-center sm:text-left">&copy;
                        <a href="https://chinwalprasad.dev"
                        class="font-semibold bg-yellow-200 text-indigo-400 hover:text-indigo-600 hover:bg-yellow-300 inline=block py-1 px-2 rounded-lg m-1"
                        target="_blank" rel="noopener noreferrer" title="Chinwal Prasad's website"
                        > {{ $page->siteAuthor }}
                        </a>
                        {{ date('Y') }}.
                    </p>
                    <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-gray-800 dark:text-gray-100 text-sm"
                    >
                    Built with <a href="http://jigsaw.tighten.co" class="" title="Jigsaw by Tighten">Jigsaw</a> and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                    </span>
                </div>
            </div>
        </footer>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')
    </body>
</html>
