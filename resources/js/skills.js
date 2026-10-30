import { Notify } from "notiflix";

$(document).ready(function () {
    const table = $("#skills").DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        scrollX: true,
        pageLength: 10,
        lengthChange: true,
        autoWidth: false,
        ajax: {
            url: "/admin/skills/data",
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
            { data: "name", name: "name" },
            { data: "category_name", name: "category.name" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    const categoryTable = $("#skill-categories").DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        autoWidth: false,
        ajax: "/admin/skills/category/data",
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "name", name: "name" },
            { data: "skills_count", name: "skills_count", searchable: false },
            { data: "action", name: "action", orderable: false, searchable: false },
        ],
    });

    function refreshCategories(selectedId = null) {
        $.get("/admin/skills/categories", function (response) {
            const options = ['<option value="">Pilih kategori</option>'];

            $.each(response.data, function (_, category) {
                options.push(
                    `<option value="${category.id}">${category.name}</option>`,
                );
            });

            $("#skill_category_id, #edit_skill_category_id")
                .html(options.join(""))
                .val(selectedId);
            $("#addSkillButton").prop("disabled", response.data.length === 0);
        });
    }

    $("#addSkillCategoryForm").on("submit", function (e) {
        e.preventDefault();
        const form = $(this);
        const button = form.find('button[type="submit"]');

        $.ajax({
            url: "/admin/skills/category/store",
            type: "POST",
            data: form.serialize(),
            beforeSend: function () {
                button.prop("disabled", true).text("Saving...");
            },
            success: function (response) {
                Notify.success(response.message);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("add-skill-category"),
                ).hide();
                form[0].reset();
                categoryTable.ajax.reload(null, false);
                refreshCategories();
            },
            error: showErrors,
            complete: function () {
                button.prop("disabled", false).text("Save changes");
            },
        });
    });

    $(document).on("click", ".edit-skill-category", function () {
        $.get(`/admin/skills/category/show/${$(this).data("id")}`)
            .done(function (response) {
                $("#edit_category_id").val(response.data.id);
                $("#edit_skill_category_name").val(response.data.name);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("edit-skill-category"),
                ).show();
            })
            .fail(function () {
                Notify.failure("Gagal mengambil data kategori");
            });
    });

    $("#editSkillCategoryForm").on("submit", function (e) {
        e.preventDefault();
        const form = $(this);
        const id = $("#edit_category_id").val();
        const button = form.find('button[type="submit"]');

        $.ajax({
            url: `/admin/skills/category/update/${id}`,
            type: "PUT",
            data: form.serialize(),
            beforeSend: function () {
                button.prop("disabled", true).text("Updating...");
            },
            success: function (response) {
                Notify.success(response.message);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("edit-skill-category"),
                ).hide();
                categoryTable.ajax.reload(null, false);
                table.ajax.reload(null, false);
                refreshCategories();
            },
            error: showErrors,
            complete: function () {
                button.prop("disabled", false).text("Update");
            },
        });
    });

    $(document).on("click", ".delete-skill-category", function () {
        const id = $(this).data("id");

        Confirm.show(
            "Hapus Kategori",
            "Skill dalam kategori ini juga akan terhapus. Lanjutkan?",
            "Ya, Hapus",
            "Batal",
            function () {
                $.ajax({
                    url: `/admin/skills/category/destroy/${id}`,
                    type: "DELETE",
                    success: function (response) {
                        Notify.success(response.message);
                        categoryTable.ajax.reload(null, false);
                        table.ajax.reload(null, false);
                        refreshCategories();
                    },
                    error: function () {
                        Notify.failure("Gagal menghapus kategori");
                    },
                });
            },
            function () {
                Notify.warning("Penghapusan dibatalkan");
            },
        );
    });

    $("#addSkillForm").on("submit", function (e) {
        e.preventDefault();
        const form = $(this);
        const button = form.find('button[type="submit"]');

        $.ajax({
            url: "/admin/skills/store",
            type: "POST",
            data: form.serialize(),
            beforeSend: function () {
                button.prop("disabled", true).text("Saving...");
            },
            success: function (response) {
                Notify.success(response.message);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("add-skill"),
                ).hide();
                form[0].reset();
                table.ajax.reload(null, false);
            },
            error: showErrors,
            complete: function () {
                button.prop("disabled", false).text("Save changes");
            },
        });
    });

    $(document).on("click", ".edit-skill", function () {
        const id = $(this).data("id");

        $.get(`/admin/skills/show/${id}`)
            .done(function (response) {
                $("#edit_skill_id").val(response.data.id);
                $("#edit_skill_name").val(response.data.name);
                $("#edit_skill_category_id").val(response.data.skill_category_id);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("edit-skill"),
                ).show();
            })
            .fail(function () {
                Notify.failure("Gagal mengambil data skill");
            });
    });

    $("#editSkillForm").on("submit", function (e) {
        e.preventDefault();
        const form = $(this);
        const id = $("#edit_skill_id").val();
        const button = form.find('button[type="submit"]');

        $.ajax({
            url: `/admin/skills/update/${id}`,
            type: "PUT",
            data: form.serialize(),
            beforeSend: function () {
                button.prop("disabled", true).text("Updating...");
            },
            success: function (response) {
                Notify.success(response.message);
                bootstrap.Modal.getOrCreateInstance(
                    document.getElementById("edit-skill"),
                ).hide();
                table.ajax.reload(null, false);
            },
            error: showErrors,
            complete: function () {
                button.prop("disabled", false).text("Update");
            },
        });
    });

    $(document).on("click", ".delete-skill", function () {
        const id = $(this).data("id");

        Confirm.show(
            "Hapus Data",
            "Yakin ingin menghapus skill ini?",
            "Ya, Hapus",
            "Batal",
            function () {
                $.ajax({
                    url: `/admin/skills/destroy/${id}`,
                    type: "DELETE",
                    success: function (response) {
                        Notify.success(response.message);
                        table.ajax.reload(null, false);
                    },
                    error: function () {
                        Notify.failure("Gagal menghapus skill");
                    },
                });
            },
            function () {
                Notify.warning("Penghapusan dibatalkan");
            },
        );
    });

    $(".modal").on("hidden.bs.modal", function () {
        if (document.activeElement) {
            document.activeElement.blur();
        }
    });
});

function showErrors(xhr) {
    if (xhr.status === 422 && xhr.responseJSON?.errors) {
        $.each(xhr.responseJSON.errors, function (key, value) {
            Notify.failure(value[0]);
        });
    } else {
        Notify.failure(xhr.responseJSON?.message || "Terjadi kesalahan");
    }
}
