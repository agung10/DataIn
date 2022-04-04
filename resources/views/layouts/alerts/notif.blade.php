@error('name')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('nameP')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('email')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('password')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('passwordE')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('f_status')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('relationship')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('w_status')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('level')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror
@error('number')
<script>
    Toastify({
        text: "Gagal!, {{$message}}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@enderror

@if(session("alertErrorT"))
<script>
    Toastify({
        text: "{{ session('alertErrorT') }}",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#dc3545",
    }).showToast();
</script>
@endif


@if(session("alertStore"))
<script>
    Toastify({
        text: "{{ session('alertStore') }} Berhasil Ditambah",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#198754",
    }).showToast();
</script>
@elseif(session("alertUpdate"))
<script>
    Toastify({
        text: "{{ session('alertUpdate') }} Berhasil Diubah",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#198754",
    }).showToast();
</script>
@elseif(session("alertDestroy"))
<script>
    Toastify({
        text: "{{ session('alertDestroy') }} Berhasil Dihapus",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "right",
        backgroundColor: "#198754",
    }).showToast();
</script>

@elseif (session()->has('success'))
<script>
    Toastify({
        text: 'Selamat Datang di Aplikai Pendataan Warga | DataIn versi 1.0',
        duration: 5000,
        close: true,
        gravity: "bottom",
        position: "center",
        backgroundColor: "#6c757d",
    }).showToast();
</script>
@endif