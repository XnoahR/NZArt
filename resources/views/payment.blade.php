@extends('Components.main')
@section('content')
    @if ($errors->any())
        <div class="bg-red-500 dark:bg-red-800 text-white text-center py-2">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="container border mt-24 border-red-500 flex mx-auto">
        <div class="flex flex-col w-1/2 ms-3 justify-center ">
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
                <div class="flex flex-col pt-3 pb-2 border-b">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Status</dt>
                    <dd class="text-lg font-semibold">{{ $order->status }}</dd>
                </div>
            </dl>
        </div>

        <div class="w-1/2 border border-green-500 ">

        </div>
    </div>
@endsection
