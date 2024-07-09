@extends('Components.main')
@section('content')
    <section
        class="bg-white dark:bg-gray-900 h-screen flex flex-col place-item items-center justify-normal mt-16 space-y-5 border border-red-500">
        <div class="w-3/4 ">
            @foreach ($orders as $order)
                <p class="dark:text-white border bg-white dark:bg-blue-950 border-red-500 py-3 text-center rounded-md my-3">Order <span
                        class="text-red-500">{{ $order->product->name }}</span> sedang dalam status {{ $order->status }}</p>
            @endforeach
        </div>
        <nav aria-label="Page navigation example" class="flex justify-center py-3 text-gray-900  dark:text-white">
            <ul class="inline-flex -space-x-px text-sm mx-auto">
                <li>
                    <a href="{{ $orders->previousPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg 
                       {{ $orders->onFirstPage() ? 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' : 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}"
                        @if ($orders->onFirstPage()) aria-disabled="true" tabindex="-1" @endif>
                        Previous
                    </a>
                </li>

                @for ($i = 1; $i <= $orders->lastPage(); $i++)
                    <li>
                        <a href="{{ $orders->url($i) }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 
                           {{ $orders->currentPage() == $i ? 'bg-blue-500 text-white' : 'bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                            {{ $i }}
                        </a>
                    </li>
                @endfor

                <li>
                    <a href="{{ $orders->nextPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg 
                       {{ $orders->hasMorePages() ? 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' : 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' }}"
                        @if (!$orders->hasMorePages()) aria-disabled="true" tabindex="-1" @endif>
                        Next
                    </a>
                </li>
            </ul>
        </nav>

    </section>
@endsection
