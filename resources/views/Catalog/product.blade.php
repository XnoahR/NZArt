@extends('Components.main')
@section('content')
    @if($errors->any())
        <div class="bg-red-500 dark:bg-red-800 text-white text-center py-2">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <section class="container mt-24 mx-auto h-screen">
        <div class="flex flex-col">
            <div class="bg-blue-500 dark:bg-blue-800 py-2 text-3xl text-white font-thin ps-3 rounded-t-md">Katalog</div>
            @include('Components.breadcrumb')
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-red-50 dark:bg-red-900 md:max-h-screen max-h-64">
                    <img class="md:w-full w-full h-64 md:h-full object-cover" src="{{ asset($product->image) }}"
                        alt="">
                </div>
                <div class="bg-gray-50 dark:bg-gray-900 text-black dark:text-white flex flex-col pt-3 px-6">
                    <h1 class="text-2xl font-semibold border-b pb-2 border-black dark:border-white">{{ $product->name }}</h1>
                    <form action="{{ route('order.create',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="size">Ukuran</label>
                            <select name="size" id="size"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white">
                                <option value="A4">A4</option>
                                <option value="A3">A3</option>
                                <option value="A2">A2</option>
                                <option value="A1">A1</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="material">Jenis Cetakan</label>
                            <select name="material" id="material"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white">
                                <option value="Art Paper">Art Paper</option>
                                <option value="HVS">HVS</option>
                                <option value="Ivory">Ivory</option>
                                <option value="Linen">Linen</option>
                                <option value="Manila">Manila</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mt-3">

                            <label for="file">File Design</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="file" name="file" type="file">

                        </div>
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="pages">Jumlah Lembar</label>
                            <input type="number" name="pages" id="pages"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white">
                        </div>
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="quantity">Jumlah Rangkap</label>
                            <input type="number" name="quantity" id="quantity"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white">
                        </div>

                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="total">Total Harga</label>
                            <input type="text" name="total" id="total"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white" readonly>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 dark:bg-blue-700 hover:bg-blue-700 text-white w-2/5 text-center mx-auto py-3 px-4 rounded-full mt-6">
                            Pesan
                        </button>
                    </form>
                </div>
            </div>
            <div class="bg-white space-y-3 p-3 dark:bg-slate-900 dark:text-white text-black">
                <h1 class="text-2xl font-semibold border-b pb-2 border-black dark:border-white">Deskripsi Produk</h1>
                <p> {{ $product->description }}</p>

            </div>
        </div>
    </section>
@endsection
