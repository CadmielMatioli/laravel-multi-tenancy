<div id="modal-delete" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div id="modalContentDelete" class="bg-white rounded-lg p-5 w-96 transform scale-95 opacity-0 transition-all duration-150 ease-in-out">
            <h2 class="text-lg font-bold mb-4">{{ $title ?? '' }}</h2>
            <p id="modalMessageDelete">{{ $message ?? '' }} <strong>{{ $name ?? '' }}</strong></p>
            <div class="flex justify-end mt-4">
                <button class="px-4 py-2 text-gray-500" onclick="closeModalDelete()">Cancelar</button>
                <form id="deleteForm" action="{{ $actionUrl ?? '' }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-900">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const modalDelete = document.getElementById('modal-delete');
    function openModalDelete(actionUrl, name = '') {
        const modalContent = document.getElementById('modalContentDelete');
        document.getElementById('deleteForm').action = actionUrl;
        modalContent.querySelector('#modalMessageDelete').innerHTML = `{{$message}} <strong>${name}</strong>?`;
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        modalDelete.classList.remove('hidden');
        void modalContent.offsetWidth;
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }

    function closeModalDelete() {
        const modalContent = document.getElementById('modalContentDelete');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modalDelete.classList.add('hidden');
        }, 150);
    }

    modalDelete.addEventListener('click', closeModalOnClickOutsideDelete);
    document.addEventListener('keydown', closeModalOnEscDelete);

    function closeModalOnClickOutsideDelete(event) {
        const modalContent = document.getElementById('modalContentDelete');
        if (!modalDelete.contains(event.target) || !modalContent.contains(event.target)) {
            closeModalDelete();
        }
    }

    function closeModalOnEscDelete(event) {
        if (event.key === "Escape") {
            closeModalDelete();
        }
    }
</script>
