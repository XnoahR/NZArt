@extends('Components.main')
@section('content')
    <section class="w-full h-80s flex items-center">


        <form class="max-w-sm px-2.5 mx-auto " action="{{ route('account.updateProfile') }} " method="POST">
            @csrf
            @method('PUT')
            {{-- Username --}}
            <div class="mb-5 ">
                <label for="name" class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="name" name="name"
                    class="mr-32 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="{{ $user->name }}" required />
            </div>
            {{-- Email --}}
            <div class="mb-5">
                <label for="email"
                    class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name=" email"
                    class="mr-32 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    value="{{ $user->email }}" required />
            </div>
            <div class="mb-5">
                <label for="address"
                    class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="address" name="address"
                    class="mr-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $user->address }}" />
            </div>
            <div class="mb-5">
                <label for="phone" class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">No
                    HP</label>
                <input type="text" id="phone" name="phone"
                    class="mr-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required value="{{ $user->phone }}" />
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <a href="{{ route('session.logout') }}"
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Logout</a>
            <div class="max-w-sm mx-auto">
        </form>
        {{-- Logout button --}}
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
    </section>
@endsection
