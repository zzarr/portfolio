$(document).ready(function () {
    // Skills DataTable initialization
    const table = $("#skills").DataTable({
        processing: true,
        serverSide: true,
        // 1. Matikan responsive agar kolom tidak di-collapse (disembunyikan)
        responsive: false,
        // 2. Aktifkan scroll horizontal
        scrollX: true,
        pageLength: 10,
        lengthChange: true,
        autoWidth: false,
        ajax: {
            url: "/skills/data",
            type: "GET",
        },
        columns: [
            { data: "name", name: "name" },
            { data: "level", name: "level" },
        ],
    });
});
