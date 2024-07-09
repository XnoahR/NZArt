@extends('Components.main')
@section('content')
<div class="p-4 sm:ml-64">
    <div class="w-full mt-6 mx-auto">
        <div class="md:w-1/2 mx-auto bg-gray-50 border shadow-md dark:bg-gray-800 p-6 rounded-md">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $order->id }}">

                <div class="mb-5">
                    <label for="user"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                    <input type="text" id="user" name="user"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->user->name }}" disabled />
                </div>

                <div class="mb-5">
                    <label for="product"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                    <input type="text" id="product" name="product"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->product->name }}" disabled />
                </div>

                <div class="mb-5">
                    <label for="material"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Material</label>
                    <input type="text" id="material" name="material"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->material }}" disabled />
                </div>

                <div class="mb-5">
                    <label for="size"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Size</label>
                    <input type="text" id="size" name="size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->size }}" disabled />
                </div>


                {{-- File Design --}}
                <div class="mb-5">
                    <label for="design"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Design</label>
                    {{-- Download --}}
                    <a href="{{ route('admin.downloadFile', $order->file) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Download</a>
                </div>

                {{-- Halaman --}}
                <div class="mb-5">
                    <label for="page"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Page</label>
                    <input type="number" id="page" name="page"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->pages }}" disabled />
                </div>

                {{-- Rangkap --}}
                <div class="mb-5">
                    <label for="copy"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Copy</label>
                    <input type="number" id="copy" name="copy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $order->quantity }}" disabled />
                </div>

                {{-- Total --}}
                <div class="mb-5">
                    <label for="total"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="text" id="total" name="total"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="Rp. {{ $order->price }}" disabled />
                </div>

                {{-- Return Button --}}
                <a href="{{ route('account.order') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Return</a>
            </form>

            {{-- Delete Form --}}

        </div>
    </div>
</div>