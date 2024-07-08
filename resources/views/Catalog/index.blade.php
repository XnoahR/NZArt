@extends('Components.main')
@section('content')
    <section class="container mt-24 mx-auto h-screen">
        <div class="grid ">
            <div class="bg-blue-500 py-2 text-3xl text-white font-thin ps-3 rounded-t-md">Katalog</div>
            @include('Components.breadcrumb')
            <div class="bg-white space-y-3 p-3 dark:bg-slate-900 dark:text-white text-black">
                <p> berbagai kebutuhan cetakmu. Hadir dengan teknologi digital print sehingga Anda dapat mencetak dalam
                    jumlah sedikit dalam waktu singkat.</p>

                <p>Teknologi Digital Printing saat ini semakin populer karena proses cetaknya lebih ringkas dari Offset
                    Printing.</p>

                <p> Pesan sekarang juga di NZArt.co.id !</p>

            </div>

            <div
                class="bg-white grid max-sm:grid-cols-1 max-sm:justify-items-center max-md:grid-cols-2 sm:place-items-center md:place-items-stretch   md:grid-cols-4 gap-6 py-3 px-3 dark:bg-slate-900">
                @foreach ($products as $product)
                    @include('Components.catalog_card')
                @endforeach
            </div>
            <nav aria-label="Page navigation example" class="flex justify-center py-3 text-gray-900  dark:text-white">
                <ul class="inline-flex -space-x-px text-sm mx-auto">
                    <li>
                        <a href="{{ $products->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg 
                           {{ $products->onFirstPage() ? 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' : 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}"
                            @if ($products->onFirstPage()) aria-disabled="true" tabindex="-1" @endif>
                            Previous
                        </a>
                    </li>

                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li>
                            <a href="{{ $products->url($i) }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 
                               {{ $products->currentPage() == $i ? 'bg-blue-500 text-white' : 'bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    <li>
                        <a href="{{ $products->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg 
                           {{ $products->hasMorePages() ? 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' : 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' }}"
                            @if (!$products->hasMorePages()) aria-disabled="true" tabindex="-1" @endif>
                            Next
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
