@extends('Components.main')
@section('content')
    <section class="container mt-24 mx-auto h-screen">
        <div class="grid ">
            <div class="bg-blue-500 py-2 text-3xl font-thin ps-3 rounded-t-md">Print A3+</div>
            @include('Components.breadcrumb')
            <div class="bg-white space-y-3 p-3 dark:bg-gray-900 dark:text-white text-black">
                <p> berbagai kebutuhan cetakmu. Hadir dengan teknologi digital print sehingga Anda dapat mencetak dalam
                    jumlah sedikit dalam waktu singkat.</p>

                <p>Teknologi Digital Printing saat ini semakin populer karena proses cetaknya lebih ringkas dari Offset
                    Printing.</p>

                <p> Pesan sekarang juga di NZArt.co.id !</p>

            </div>

            <div class="bg-white grid grid-cols-1 md:grid-cols-4 gap-6 py-3 px-3 dark:bg-gray-900">
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
                @include('Components.catalog_card')
            </div>
        </div>
    </section>
@endsection
