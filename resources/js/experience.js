import { Notify } from "notiflix";

//datatables
$(document).ready(function () {
    // =========================
    // DATATABLES
    // =========================

    const table = $("#experience").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        pageLength: 10,
        lengthChange: true,
        autoWidth: false,

        ajax: {
            url: "/admin/experience/data",
            type: "GET",
        },

        dom: "Bfrtip",

        buttons: [
            {
                extend: "print",
                text: '<i class="ri-printer-line"></i> Print',
                className: "btn btn-primary btn-sm",
            },
            {
                extend: "excel",
                text: '<i class="ri-file-excel-line"></i> Excel',
                className: "btn btn-success btn-sm",
            },
            {
                extend: "pdf",
                text: '<i class="ri-file-pdf-line"></i> PDF',
                className: "btn btn-danger btn-sm",
            },
            {
                extend: "colvis",
                text: '<i class="ri-eye-line"></i> Column',
                className: "btn btn-info btn-sm",
            },
        ],

        columns: [
            {
                data: "company_name",
                name: "company_name",
            },
            {
                data: "position",
                name: "position",
            },
            {
                data: "start_date",
                name: "start_date",
            },
            {
                data: "end_date",
                name: "end_date",
            },
            {
                data: "status",
                name: "status",
                orderable: false,
                searchable: false,
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    // =========================
    // TAMBAH DETAIL
    // =========================
    $("#add-detail").on("click", function () {
        let html = `
                <div class="input-group mb-2 experience-detail-item">

                    <input type="text"
                        name="details[]"
                        class="form-control"
                        placeholder="Contoh: Membuat dan maintenance website"
                        required>

                    <button type="button"
                        class="btn btn-danger remove-detail">
                        <i class="ri-delete-bin-line"></i>
                    </button>

                </div>
            `;

        $("#experience-detail-wrapper").append(html);
    });

    // =========================
    // HAPUS DETAIL
    // =========================
    $(document).on("click", ".remove-detail", function () {
        if ($(".experience-detail-item").length > 1) {
            $(this).closest(".experience-detail-item").remove();
        }
    });

    // =========================
    // IS CURRENT
    // =========================
    $("#is_current").on("change", function () {
        if ($(this).is(":checked")) {
            $("#end_date").val("").prop("disabled", true);
        } else {
            $("#end_date").prop("disabled", false);
        }
    });

    $("#addExperienceForm").on("submit", function (e) {
        e.preventDefault();

        let form = $(this);
        let button = form.find('button[type="submit"]');

        // =========================
        // CLOSE MODAL LANGSUNG
        // =========================
        const modalElement = document.getElementById("add-experience");

        const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);

        modalInstance.hide();

        $.ajax({
            url: "/admin/experience/store",
            type: "POST",
            data: form.serialize(),

            beforeSend: function () {
                button.prop("disabled", true);
                button.html("Saving...");
            },

            success: function (response) {
                Notify.success("Experience berhasil ditambahkan");

                form[0].reset();

                $("#experience-detail-wrapper").html(`
                <div class="input-group mb-2 experience-detail-item">

                    <input type="text"
                        name="details[]"
                        class="form-control"
                        placeholder="Contoh: Membuat dan maintenance website"
                        required>

                    <button type="button"
                        class="btn btn-danger remove-detail">
                        <i class="ri-delete-bin-line"></i>
                    </button>

                </div>
            `);

                $("#end_date").prop("disabled", false);

                table.ajax.reload(null, false);
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        Notify.error(value[0]);
                    });
                } else {
                    Notify.error("Terjadi kesalahan");
                }
            },

            complete: function () {
                button.prop("disabled", false);
                button.html("Save changes");
            },
        });
    });

    // =========================
    // GET DETAIL EXPERIENCE
    // =========================
    $(document).on("click", ".edit-experience", function () {
        let id = $(this).data("id");

        $.ajax({
            url: `/admin/experience/show/${id}`,
            type: "GET",

            success: function (response) {
                let data = response.data;

                $("#edit_id").val(data.id);
                $("#edit_company_name").val(data.company_name);
                $("#edit_position").val(data.position);
                $("#edit_location").val(data.location);
                $("#edit_start_date").val(data.start_date);
                $("#edit_end_date").val(data.end_date);
                $("#edit_description").val(data.description);

                $("#edit_is_current").prop("checked", data.is_current);

                $("#edit-experience-modal").modal("show");
            },
        });
    });
    // =========================
    // DELETE EXPERIENCE
    // =========================
    $(document).on("click", ".delete-experience", function () {
        let id = $(this).data("id");

        Confirm.show(
            "Hapus Data",
            "Yakin ingin menghapus experience ini?",
            "Ya, Hapus",
            "Batal",

            function okCb() {
                $.ajax({
                    url: `/admin/experience/destroy/${id}`,
                    type: "DELETE",

                    beforeSend: function () {
                        Notify.warning("Menghapus data...");
                    },

                    success: function (response) {
                        Notify.success(response.message);

                        table.ajax.reload(null, false);
                    },

                    error: function () {
                        Notify.failure("Gagal menghapus data");
                    },
                });
            },

            function cancelCb() {
                Notify.warning("Penghapusan dibatalkan");
            },
        );
    });
});
