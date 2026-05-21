import select2 from "select2";
import "select2/dist/css/select2.min.css";

select2();
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
                data: "slug",
                name: "slug",
            },

            {
                data: "description",
                name: "description",
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
        dialogsInBody: true,
    });

    $("#edit_content").summernote({
        height: 300,
        placeholder: "Tulis sesuatu...",
        focus: true,
        dialogsInBody: true,
    });

    $("#thumbnail").dropify();
    $("#edit_thumbnail").dropify();

    $("#add-project").on("shown.bs.modal", function () {
        if (!$("#tags").hasClass("select2-hidden-accessible")) {
            $("#tags").select2({
                dropdownParent: $("#add-project"),
                placeholder: "Select tags",
                width: "100%",
            });
        }
    });

    $("#edit-project").on("shown.bs.modal", function () {
        if (!$("#edit_tags").hasClass("select2-hidden-accessible")) {
            $("#edit_tags").select2({
                dropdownParent: $("#edit-project"),
                placeholder: "Select tags",
                width: "100%",
            });
        }
    });

    // =========================
    // ADD PROJECT
    // =========================

    $("#addProjectForm").on("submit", function (e) {
        e.preventDefault();

        const form = this;
        const formData = new FormData(form);

        // checkbox fix
        formData.set("is_featured", $("#is_featured").is(":checked") ? 1 : 0);

        // button loading
        const $btn = $('button[form="addProjectForm"]');
        $btn.prop("disabled", true).text("Saving...");

        $.ajax({
            url: "/admin/projects/store",
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
                if ($.fn.DataTable.isDataTable("#projects")) {
                    $("#projects").DataTable().ajax.reload(null, false);
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

    // =========================
    // EDIT PROJECT
    // =========================

    $(document).on("click", ".edit-project", function () {
        let id = $(this).data("id");

        $.ajax({
            url: `/admin/projects/show/${id}`,
            type: "GET",

            success: function (response) {
                let data = response.data;

                // simpan id
                $("#edit_id").val(data.id);

                // isi input
                $("#edit_title").val(data.title);
                $("#edit_slug").val(data.slug);
                $("#edit_github_url").val(data.github_url);
                $("#edit_description").val(data.description);

                $("#edit_content").summernote("code", data.content);

                // checkbox
                $("#edit_is_featured").prop("checked", data.is_featured == 1);

                // set tags
                let selectedTags = data.tags.map((tag) => tag.id);

                $("#edit_tags").val(selectedTags).trigger("change");

                // update dropify preview
                let drEvent = $("#edit_thumbnail").data("dropify");

                if (drEvent) {
                    drEvent.resetPreview();

                    drEvent.clearElement();

                    drEvent.settings.defaultFile = data.thumbnail
                        ? `/storage/${data.thumbnail}`
                        : "";

                    drEvent.destroy();

                    drEvent.init();
                }

                // tampilkan modal
                $("#edit-project").modal("show");
            },

            error: function () {
                Notify.failure("Gagal mengambil data project");
            },
        });
    });

    // ==========================
    // UPDATE PROJECT
    // ==========================
    $("#editProjectForm").on("submit", function (e) {
        e.preventDefault();

        const form = this;

        const id = $("#edit_id").val();

        const formData = new FormData(form);

        formData.append("_method", "PUT");

        formData.set(
            "is_featured",
            $("#edit_is_featured").is(":checked") ? 1 : 0,
        );

        const $btn = $("#updateProjectBtn");

        $btn.prop("disabled", true).text("Updating...");

        $.ajax({
            url: `/admin/projects/update/${id}`,

            type: "POST",

            data: formData,

            processData: false,

            contentType: false,

            success: function (response) {
                Notify.success(response.message);

                const modalEl = document.getElementById("edit-project");

                const modal = bootstrap.Modal.getInstance(modalEl);

                modal.hide();

                $("#projects").DataTable().ajax.reload(null, false);
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        Notify.failure(value[0]);
                    });
                } else {
                    Notify.failure(
                        xhr.responseJSON?.message || "Terjadi kesalahan",
                    );
                }
            },

            complete: function () {
                $btn.prop("disabled", false).text("Update");
            },
        });
    });

    // =========================
    // DELETE PROJECT
    // =========================

    $(document).on("click", ".delete-project", function () {
        let id = $(this).data("id");

        Confirm.show(
            "Hapus Data",
            "Yakin ingin menghapus project ini?",
            "Ya, Hapus",
            "Batal",

            function okCb() {
                $.ajax({
                    url: `/admin/projects/destroy/${id}`,

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

    $("#edit-project").on("hidden.bs.modal", function () {
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });

    $(".modal").on("hidden.bs.modal", function () {
        $(document.activeElement).blur();

        $("body").removeClass("modal-open");

        $(".modal-backdrop").remove();
    });
});
