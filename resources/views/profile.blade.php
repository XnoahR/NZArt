@extends('Components.main')
@section('content')
<section class="w-full h-80s flex items-center border border-red-500">
    

<form class="max-w-sm px-2.5 mx-auto ">
    <div class="mb-5 ">
      <label for="username" class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
      <input type="text" id="username" class="mr-32 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="NZArts" required />
    </div>
    <div class="mb-5">
      <label for="nik" class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
      <input type="text" id="nik" class="mr-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <div class="mb-5">
      <label for="no-hp" class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
      <input type="text" id="no-hp" class="mr-16 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
   
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
  
   <div class="max-w-sm mx-auto">
    
   </div>
</section>
@endsection