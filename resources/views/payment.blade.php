@extends('Components.main')
@section('content')
    <div class="container  mt-24 flex flex-col sm:flex-row mx-auto">
        <div class="flex flex-col w-full sm:w-1/2 ms-3 justify-center ">
            <dl class="max-w-md my-3 text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama Produk</dt>
                    <dd class="text-lg font-semibold">{{ $order->product->name }}</dd>
                </div>
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenis</dt>
                    <dd class="text-lg font-semibold">{{ $order->material }}</dd>
                </div>
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Ukuran</dt>
                    <dd class="text-lg font-semibold">{{ $order->size }}</dd>
                </div>
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Halaman</dt>
                    <dd class="text-lg font-semibold">{{ $order->pages }}</dd>
                </div>
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Rangkap</dt>
                    <dd class="text-lg font-semibold">{{ $order->quantity }}</dd>
                </div>
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total Harga</dt>
                    <dd class="text-lg font-semibold">Rp {{ $order->price }}</dd>
                </div>
                <div class="flex flex-col pt-1  border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Status</dt>
                    <dd class="text-lg font-semibold">{{ $order->status }}</dd>
                </div>
            </dl>
        </div>

        <div class=" w-full sm:w-1/2 sm:px-6  py-6 border shadow-lg dark:shadow-blue-500 dark:border-blue-400 rounded-md">
            <form action="{{ route('order.pay', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $payment->id }}">

                {{-- <div class="mb-5">
                    <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
                    <input type="text" id="user" name="user"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $payment->user->name }}" disabled />
                </div> --}}

                <div class="mb-5 ">
                    <label for="payment_method"
                        class="text-xl font-semibold block mb-2  text-gray-900 dark:text-white">Pilih
                        Metode Pembayaran</label>
                    <select id="payment_method" name="payment_method"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="BANK">BRI: 352000123123123</option>
                        <option value="DANA">Dana: 085858281892</option>
                        <option value="GOPAY">GoPay: 085858281892</option>
                        <option value="OVO">OVO: 085858281892</option>
                    </select>
                </div>



                <p class="text-black dark:text-white my-3">
                    Silahkan transfer dengan nilai <span class="text-blue-500 font-semibold">Rp.{{ $order->price }}</span>
                    ke salah satu rekening diatas, lalu upload bukti
                </p>


                <div class="mb-5">
                    <label for="proof" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bukti
                        Transfer</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mb-5"
                        id="proof" type="file" name="proof">
                </div>
                <h2 class="ml-1 mb-1 text-lg font-semibold text-gray-900 dark:text-white">Status:</h2>
                <ul class="max-w-md space-y-1 mb-6  list-none list-inside  text-gray-900 dark:text-white">
                    <li class="ml-3 text-2xl uppercase font-semibold text-blue-500">
                        {{ $payment->status }}
                </ul>
                

                @if ($payment->status == 'paid') 
                    <span
                    class="border border-red-600 p-3 text-red-400 font-semibold text-lg rounded-md">
                    Sudah Dibayar</span>
                @else
                <button type="submit" class=" bg-blue-500 p-3 rounded-md text-white hover:bg-blue-700 ">
                    Bayar Sekarang
                </button>
                @endif


                {{-- Return Button --}}
                {{-- <a href="{{ route('account.order') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Return</a> --}}
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>@include('Components.warning_toaster')</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        @include('Components.success_toaster')
    @endif
    @if (session('danger'))
        @include('Components.danger_toaster')
    @endif
@endsection
