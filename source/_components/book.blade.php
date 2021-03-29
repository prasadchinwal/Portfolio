<section class="flex p-6 hover:shadow-lg rounded-lg">
    <div class="flex-none w-44 relative">
        <img class="inset-0 w-full h-full rounded-lg" src="{{ $book->cover }}" alt="{{ $book->title }}" />
    </div>
    <div class="flex-auto pl-6">
        <div class="flex flex-wrap items-baseline">
            <h1 class="text-3xl w-full flex-none font-extrabold mb-2.5">
                {{ $book->title }}
            </h1>

            <div class="w-full flex items-center text-sm font-medium my-5 sm:mt-2 sm:mb-4">
                <svg width="20" height="20" fill="currentColor" class="text-gray-900">
                    <path d="M9.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.784-.57-.381-1.81.587-1.81H7.03a1 1 0 00.95-.69L9.05 3.69z" />
                </svg>
                <div class="ml-1">
                    <span class="text-xl font-extrabold w-9 h-9 flex items-center justify-center rounded-full bg-green-200 text-green-700">{{ $book->rating }}</span>
                </div>
            </div>
            <div class="py-2 text-xl leading-7 font-semibold text-purple-600">
                {{ $book->author }}
            </div>
        </div>
    </div>
</section>