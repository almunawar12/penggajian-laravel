// resources/js/sweetalert.js
function confirmDelete(id, formId) {
    // Ambil form dari ID
    var form = document.getElementById(formId);

    // Mencegah form submit secara otomatis
    event.preventDefault();

    Swal.fire({
        title: "Yakin ingin menghapus data ini?",
        text: "Data yang sudah dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika konfirmasi diterima, kirimkan form
            form.submit();
        } else {
            // Jika dibatalkan, tidak melakukan apa-apa
            Swal.fire({
                title: "Dibatalkan!",
                text: "Data tidak jadi dihapus.",
                icon: "info",
                confirmButtonColor: "#3085d6",
            });
        }
    });
}
