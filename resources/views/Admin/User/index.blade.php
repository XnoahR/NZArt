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
                    Users
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        List of all users
                    </p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->phone }}
                            </td>
                            <td class="px-6 py-4 overflow-x-hidden">
                                {{ $user->address }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.edit', $user->id) }}"
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
                        <a href="{{ $users->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg @if ($users->onFirstPage()) text-gray-300 cursor-not-allowed pointer-events-none  dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700  @else hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @endif"
                            @if ($users->onFirstPage()) aria-disabled="true" tabindex="-1" @endif>Previous</a>
                    </li>
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <li>
                            <a href="{{ $users->url($i) }}"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 {{ $users->currentPage() == $i ? 'bg-blue-500 text-white' : 'bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li>
                        <a href="{{ $users->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg @if ($users->hasMorePages()) hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white @else text-gray-300 cursor-not-allowed pointer-events-none  dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 @endif"
                            @if (!$users->hasMorePages()) aria-disabled="true" tabindex="-1" @endif>Next</a>
                    </li>
                </ul>
            </nav>


        </div>

    </div>
@endsection
