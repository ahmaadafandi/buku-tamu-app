function showToast(type, message) {
    const toastHeader = document.querySelector(
        "#liveToast .toast-header strong.me-auto"
    );
    const toastBody = document.getElementById("toast-body");
    const toastIcon = document.querySelector(
        "#liveToast .toast-header svg rect"
    );

    if (toastHeader && toastBody && toastIcon) {
        // Tentukan header, body, dan warna ikon berdasarkan tipe toast
        if (type === "success") {
            toastHeader.textContent = "Success";
            toastBody.textContent = message;
            toastIcon.setAttribute("fill", "#41ca1b"); // Hijau untuk success
        } else if (type === "error") {
            toastHeader.textContent = "Error";
            toastBody.textContent = message;
            toastIcon.setAttribute("fill", "#dc3545"); // Merah untuk error
        }

        // Inisialisasi dan tampilkan toast
        const toastElement = document.getElementById("liveToast");
        const toast = new bootstrap.Toast(toastElement, { delay: 3000 }); // 3000ms = 3 detik
        toast.show();
    }
}

function hapus(url) {
    $("body").on("click", ".hapus", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data("id");

                console.log(token);
                console.log(id);

                $.ajax({
                    url: "/" + url + "/" + id,
                    type: "delete",
                    data: {
                        id: id,
                        _token: token,
                    },
                    datatype: "json",
                    success: function (data) {
                        if (data["status"] == true) {
                            showToast("success", data["pesan"]);

                            tabledata.ajax.reload();
                        } else {
                            showToast("error", data["pesan"]);
                        }
                    },
                    error: function (data) {
                        swal.fire("Cancelled", "Process Failed!", "error");
                    },
                });
            }
        });
    });
}

// cek apakah field sudah di isi
function cek_field(id) {
    if ($(id).val() == "") {
        $(id).addClass("is-invalid");
    } else {
        $(id).removeClass("is-invalid");
    }
}
