<div class="popup fixed inset-0 flex justify-center bg-gray-800 bg-opacity-50 hidden z-20" {{$attributes}}>
    <div class="rounded-lg max-w-md absolute mt-32">
        {{-- <i class="fa-solid fa-x cerrar-popup p-2 absolute top-0 right-0 cursor-pointer" style="color: #636363;"></i> --}}
        {{$slot}}
    </div>
</div>
