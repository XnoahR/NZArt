<div class="max-w-sm rounded overflow-hidden shadow-lg border dark:border-slate-800 dark:shadow-blue-900 pt-3 flex flex-col dark:text-white text-black">
    <div>
        <div class="w-5/6 h-64  md:w-60 md:h-52 mx-auto  overflow-hidden my-3">
            <img class="mx-auto w-full h-full object-cover rounded-md border " src="{{ asset('img/cert.jpg') }}" alt="Print">
        </div>
        <div class="px-6 py-4 ">
            <div class=" text-xl mb-2">Print A4</div>
            <p class=" text-base ">
                Mulai dari <span class="text-red-500">Rp.500</span>
            </p>
        </div>
    </div>
    {{-- <p class="text-gray-700 text-base ">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste voluptas quisquam accusamus, maxime
        consectetur aperiam ut ipsa animi doloribus nemo amet maiores eligendi corporis numquam?
    </p> --}}
    
    <div class="flex justify-end me-3 mb-4 ">
        <a href="{{ route('catalog.detail') }}" class="bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded-full">
            Detail
        </a>
    </div>
</div>
