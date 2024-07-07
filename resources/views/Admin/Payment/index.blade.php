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
                    Payments
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        List of all Payments
                    </p>

                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metode
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bukti
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $payment->order->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $payment->payment_method }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $payment->total }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.downloadFile', $payment->proof) }}"
                                    class="inline-flex items-center justify-center p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M13 11.15V4a1 1 0 1 0-2 0v7.15L8.78 8.374a1 1 0 1 0-1.56 1.25l4 5a1 1 0 0 0 1.56 0l4-5a1 1 0 1 0-1.56-1.25L13 11.15Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M9.657 15.874 7.358 13H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-2.358l-2.3 2.874a3 3 0 0 1-4.685 0ZM17 16a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 uppercase text-red-500">
                                {{ $payment->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{-- Details --}}
                                <a href="{{ route('admin.viewDetail', $payment->order->id) }}"
                                    class="inline-flex items-center justify-center p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">
                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 2a10 10 0 0 1 10 10 10 10 0 0 1-10 10 10 10 0 0 1-10-10 10 10 0 0 1 10-10Zm0 2a8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 8-8 8 8 0 0 0-8-8Zm0 3a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V8a1 1 0 0 1 1-1Zm0 6a1 1 0 0 1 1 1v1a1 1 0 0 1-2 0v-1a1 1 0 0 1 1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                {{-- Download File Button --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <nav aria-label="Page navigation example"
                class="flex justify-center py-3 text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <ul class="inline-flex -space-x-px text-sm mx-auto">
                    <li>
                        <a href="{{ $payments->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg 
                           {{ $payments->onFirstPage() ? 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' : 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}"
                            @if ($payments->onFirstPage()) aria-disabled="true" tabindex="-1" @endif>
                            Previous
                        </a>
                    </li>

                    @for ($i = 1; $i <= $payments->lastPage(); $i++)
                        <li>
                            <a href="{{ $payments->url($i) }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 
                               {{ $payments->currentPage() == $i ? 'bg-blue-500 text-white' : 'bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor

                    <li>
                        <a href="{{ $payments->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg 
                           {{ $payments->hasMorePages() ? 'hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' : 'text-gray-300 cursor-not-allowed pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700' }}"
                            @if (!$payments->hasMorePages()) aria-disabled="true" tabindex="-1" @endif>
                            Next
                        </a>
                    </li>

                </ul>
            </nav>


        </div>

    </div>
@endsection
