<div id="modal-logout" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div id="modalContentLogout" class="bg-white rounded-lg p-5 w-96 transform scale-95 opacity-0 transition-all duration-150 ease-in-out">
            <h2 class="text-lg font-bold mb-4">{{ $title ?? '' }}</h2>
            <p id="modalMessageLogout">{{ $message ?? '' }}</p>
            <div class="flex justify-end mt-4">
                <button class="px-4 py-2 text-gray-500" onclick="closeModalLogout()">Continuar logado</button>
                <form id="logoutForm" action="{{ $actionUrl ?? '' }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-900">Sair</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const modalLogout = document.getElementById('modal-logout');
    function openModalLogout(actionUrl, name = '') {
        const modalContent = document.getElementById('modalContentLogout');
        document.getElementById('logoutForm').action = actionUrl;
        modalContent.querySelector('#modalMessageLogout').innerHTML = `{{$message}} <strong>${name}</strong>?`;
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        modalLogout.classList.remove('hidden');
        void modalContent.offsetWidth;
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }

    function closeModalLogout() {
        const modalContent = document.getElementById('modalContentLogout');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modalLogout.classList.add('hidden');
        }, 150);
    }

    modalLogout.addEventListener('click', closeModalOnClickOutsideLogout);
    document.addEventListener('keydown', closeModalOnEscLogout);

    function closeModalOnClickOutsideLogout(event) {
        const modalContent = document.getElementById('modalContentLogout');
        if (!modalLogout.contains(event.target) || !modalContent.contains(event.target)) {
            closeModalLogout();
        }
    }

    function closeModalOnEscLogout(event) {
        if (event.key === "Escape") {
            closeModalLogout();
        }
    }
</script>
