@extends('Components.main')
@section('content')
    <section class="container mt-24 mx-auto h-screen">
        <div class="flex flex-col">
            <div class="bg-blue-500 dark:bg-blue-800 py-2 text-3xl text-white font-thin ps-3 rounded-t-md">Katalog</div>
            @include('Components.breadcrumb')
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-red-50 dark:bg-red-900 md:max-h-none max-h-64">
                    <img class="md:w-full w-full h-64 md:h-full object-cover" src="{{ asset('img/Cert.jpg') }}" alt="">
                </div>
                <div class="bg-gray-50 dark:bg-gray-900 text-black dark:text-white flex flex-col pt-3 px-6">
                    <h1 class="text-2xl font-semibold border-b pb-2 border-black dark:border-white">Print Certificate</h1>
                    <form action="#" method="">
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
                                <option value="artpaper">Art Paper</option>
                                <option value="hvs">HVS</option>
                                <option value="ivory">Ivory</option>
                                <option value="linen">Linen</option>
                                <option value="manila">Manila</option>
                            </select>
                        </div>
                        <div class="flex flex-col space-y-2 mt-3">

                            <label for="design">File Design</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="design" type="file">

                        </div>
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="pages">Jumlah Lembar</label>
                            <input type="number" name="pages" id="pages"
                                class="border rounded-md p-1 bg-white dark:bg-gray-700 text-black dark:text-white">
                        </div>
                        <div class="flex flex-col space-y-2 mt-3">
                            <label for="copies">Jumlah Rangkap</label>
                            <input type="number" name="copies" id="copies"
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
                <p> berbagai kebutuhan cetakmu. Hadir dengan teknologi digital print sehingga Anda dapat mencetak dalam
                    jumlah sedikit dalam waktu singkat.</p>

            </div>
        </div>
    </section>
@endsection
