<div id="modal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div id="modalContent" class="bg-white rounded-lg p-5 w-96 transform scale-95 opacity-0 transition-all duration-150 ease-in-out">
            <h2 class="text-lg font-bold mb-4">{{ $title }}</h2>
            <p id="modalMessage">{{ $message }} <strong>{{ $name }}</strong></p>
            <div class="flex justify-end mt-4">
                <button class="px-4 py-2 text-gray-500" onclick="closeModal()">Cancelar</button>
                <form id="deleteForm" action="{{ $actionUrl }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-900">Deletar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function openModal(actionUrl, companyName) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        document.getElementById('deleteForm').action = actionUrl;
        modalContent.querySelector('#modalMessage').innerHTML = `{{$message}} <strong>${companyName}</strong>?`;
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        modal.classList.remove('hidden');
        void modalContent.offsetWidth;
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 150);
    }

    document.getElementById('modal').addEventListener('click', closeModalOnClickOutside);
    document.addEventListener('keydown', closeModalOnEsc);

    function closeModalOnClickOutside(event) {
        const modal = document.getElementById('modal');
        const modalContent = document.getElementById('modalContent');
        if (!modal.contains(event.target) || !modalContent.contains(event.target)) {
            closeModal();
        }
    }

    function closeModalOnEsc(event) {
        console.log(event.key)
        if (event.key === "Escape") {
            closeModal();
        }
    }
</script>
