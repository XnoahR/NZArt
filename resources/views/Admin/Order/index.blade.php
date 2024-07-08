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
                    Orders
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        List of all Orders
                    </p>

                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ukuran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Design
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Halaman
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rangkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $order->product->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->material }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->size }}
                            </td>
                            {{-- Download File Button --}}
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.downloadFile', $order->file) }}"
                                    class="inline-flex items-center justify-center p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->pages }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->price }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('admin.updateOrder', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="rounded-md text-blue-500 mx-auto w-24" name="status" id="status">
                                        <option value="pending" @if ($order->status == 'pending') selected @endif>Pending</option>
                                        <option value="processing" @if ($order->status == 'processing') selected @endif>Processing</option>
                                        <option value="completed" @if ($order->status == 'completed') selected @endif>Completed</option>
                                        <option value="cancelled" @if ($order->status == 'cancelled') selected @endif>Cancelled</option>
                                    </select>
                                    <button type="submit" class="px-3 py-1 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-700 dark:bg-gray-700 dark:hover:bg-blue-600">
                                        V
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            <nav aria-label="Page navigation example"
                class="flex justify-center py-3 text-gray-900 bg-white dark:text-white dark:bg-gray-800">
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


        </div>

    </div>
@endsection
