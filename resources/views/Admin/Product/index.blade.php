@extends('Components.admin')
@section('content')
    <div class="p-4 sm:ml-64">
        @if ($errors->any())
            @include('Components.warning_toaster')
        @endif
        @if (session('success'))
            @include('Components.success_toaster')
        @endif
        @if (session('danger'))
            @include('Components.danger_toaster')
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Products
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        List of all products
                    </p>
                    <div class="flex justify-between">


                        <a href="{{ route('admin.createProduct') }}" {{-- class="inline-flex items-center 
                        justify-center px-4 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 
                        bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-black focus:outline-none 
                        focus:shadow-outline-blue dark:text-gray-200 dark:bg-blue-500"> --}}
                            class = "inline-flex items-center justify-center px-4 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Add Product
                        </a>
                        {{-- Search --}}
                        <form action="#" method="GET">
                            <div class="flex items
                        -center justify-center mt-4">
                                <input type="text" name="search" id="search"
                                    class="w-1/2 px-3 py-2 leading-tight text-sm text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    placeholder="Search Product">
                                <button
                                    class="inline-flex items-center justify-center px-4 py-2 ml-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:text-gray-200 dark:bg-blue-500">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->slug }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.editProduct', $product->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <nav aria-label="Page navigation example"
                class="flex justify-center py-3 text-gray-900 bg-white dark:text-white dark:bg-gray-800">
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

    </div>
@endsection
