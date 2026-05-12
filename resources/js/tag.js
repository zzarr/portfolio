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
});
