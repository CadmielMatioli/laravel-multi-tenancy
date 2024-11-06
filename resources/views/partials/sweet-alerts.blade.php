@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                timer: 3000
            });
        });
    </script>
@endif

@if(session('warning'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'warning',
                title: 'Atenção!',
                text: '{{ session('warning') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });
    </script>
@endif

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: '{{ session('success') }}',
                showConfirmButton: true,
                timer: 3000
            });
        });
    </script>
@endif

@if(session('message'))
    <script>

            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: '{{ session('success') }}',
                    showConfirmButton: true,
                    timer: 3000
                });
            });
        </script>
@endif

