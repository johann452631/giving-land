<div class="modal fade" id="modaljum" >
    <div class="modal-dialog ps-4 pe-4">
        <div class="modal-content position-relative bg-gris-claro p-5">
            <span class="cierre-modal position-absolute" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#707070" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </span>
            <h2 class="text-center texto-verde pb-2">{{ $titulo }}</h2>
            @yield($content)
        </div>
    </div>
</div>