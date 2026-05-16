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
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link", "picture"]],
            ["view", ["codeview"]],
        ],
    });
});
