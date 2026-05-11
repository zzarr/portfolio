//datatables
$(document).ready(function () {
    $("#experience").DataTable({
        responsive: true,
        pageLength: 10,
        lengthChange: true,
        autoWidth: false,
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
});
