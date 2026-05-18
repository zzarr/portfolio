$(document).ready(function () {
    // =========================
    // DATATABLES
    // =========================

    const table = $("#projects").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        pageLength: 10,
        lengthChange: true,
        autoWidth: false,

        ajax: {
            url: "/admin/projects/data",
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
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "title",
                name: "title",
            },
            {
                data: "description",
                name: "description",
            },

            {
                data: "github_url",
                name: "github_url",
                orderable: false,
                searchable: false,
            },
            {
                data: "is_featured",
                name: "is_featured",
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
    // SUMMERNOTE
    // =========================

    $("#content").summernote({
        height: 300,
        placeholder: "Tulis sesuatu...",

        focus: true,
    });

    // =========================
    // ADD PROJECT
    // =========================
    $(document).ready(function () {
        $("#addProjectForm").on("submit", function (e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);

            // checkbox fix
            formData.set("is_futured", $("#is_futured").is(":checked") ? 1 : 0);

            // button loading
            const $btn = $('button[form="addProjectForm"]');
            $btn.prop("disabled", true).text("Saving...");

            $.ajax({
                url: "/admin/project/store",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function (response) {
                    Notify.success(
                        response.message || "Project berhasil ditambahkan",
                    );

                    // reset form
                    form.reset();

                    // reset dropify
                    if ($("#thumbnail").data("dropify")) {
                        $("#thumbnail").data("dropify").resetPreview();
                        $("#thumbnail").data("dropify").clearElement();
                    }

                    // tutup modal
                    const modalEl = document.getElementById("add-project");
                    const modal = bootstrap.Modal.getInstance(modalEl);

                    modal.hide();

                    // reload datatable jika ada
                    if ($.fn.DataTable.isDataTable("#projectTable")) {
                        $("#projectTable").DataTable().ajax.reload(null, false);
                    }
                },

                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            Notify.failure(value[0]);
                        });
                    } else {
                        Notify.failure(
                            xhr.responseJSON?.message || "Terjadi kesalahan",
                        );
                    }
                },

                complete: function () {
                    $btn.prop("disabled", false).text("Save changes");
                },
            });
        });

        // bersihkan backdrop bug modal
        $("#add-project").on("hidden.bs.modal", function () {
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
        });
    });
});
