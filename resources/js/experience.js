//datatables
$(document).ready(function () {
    // =========================
    // DATATABLES
    // =========================

    $("#experience").DataTable({
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

    // =========================
    // SUBMIT FORM AJAX
    // =========================
    $("#addExperienceForm").on("submit", function (e) {
        e.preventDefault();

        let form = $(this);
        let button = form.find('button[type="submit"]');

        $.ajax({
            url: "{{ route('experience.store') }}",
            type: "POST",
            data: form.serialize(),

            beforeSend: function () {
                button.prop("disabled", true);
                button.html("Saving...");
            },

            success: function (response) {
                // notify success
                notify.success("Experience berhasil ditambahkan");

                // reset form
                form[0].reset();

                // reset detail jadi 1 item
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

                // aktifkan end date lagi
                $("#end_date").prop("disabled", false);

                // close modal
                $("#add-experience").modal("hide");

                // reload datatable kalau ada
                // $('#yourTable').DataTable().ajax.reload();
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        notify.error(value[0]);
                    });
                } else {
                    notify.error("Terjadi kesalahan");
                }
            },

            complete: function () {
                button.prop("disabled", false);
                button.html("Save changes");
            },
        });
    });
});
