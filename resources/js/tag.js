import { Notify } from "notiflix";

$(document).ready(function () {
    // ================================
    // DATA TABLES
    // ================================
    const table = $("#tags").DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "/admin/tag/data",
            type: "GET",
        },

        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    // ================================
    // ADD TAG
    // ================================
    $("#addTagForm").on("submit", function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.ajax({
            url: "/admin/tag/store",
            type: "POST",
            data: formData,
            success: function (response) {
                Notify.success("Tag berhasil ditambahkan!");
                $("#addTagModal").modal("hide");
                table.ajax.reload();
                $("#addTagForm")[0].reset();
            },
            error: function (xhr) {
                Notify.failure("Gagal menambahkan tag. Silakan coba lagi.");
                console.log(xhr);
            },
        });
    });

    // =========================
    // FIX ARIA-HIDDEN WARNING
    // =========================
    $("#add-experience").on("hide.bs.modal", function () {
        // pindahkan focus keluar modal
        document.activeElement.blur();
    });

    // =========================
    // FIX ARIA-HIDDEN WARNING
    // =========================
    $("#edit-experience-modal").on("hide.bs.modal", function () {
        document.activeElement.blur();
    });
});
