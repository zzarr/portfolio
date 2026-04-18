$(function () {
    const profilePreview = $("#profilePreview");
    const profileInput = $("#profileInput");
    const btnEditProfile = $("#btnEditProfile");
    const btnUpdateProfile = $("#btnUpdateProfile");

    let selectedImage = null;
    let previewUrl = null;

    btnEditProfile.on("click", handleOpenFile);
    profileInput.on("change", handlePreviewImage);
    btnUpdateProfile.on("click", handleUpdateProfile);

    function handleOpenFile(event) {
        event.preventDefault();
        profileInput.trigger("click");
    }

    function handlePreviewImage(event) {
        const file = event.target.files?.[0];

        if (!file) return;

        selectedImage = file;

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        profilePreview.attr("src", previewUrl);
    }

    function handleUpdateProfile() {
        if (!selectedImage) {
            alert("Pilih gambar terlebih dahulu");
            return;
        }

        console.log("File siap dikirim:", selectedImage);
    }

    $(".toggle-password").on("click", handleTogglePassword);

    function handleTogglePassword() {
        const targetInput = $($(this).data("target"));
        const icon = $(this).find("i");

        const isPassword = targetInput.attr("type") === "password";

        targetInput.attr("type", isPassword ? "text" : "password");

        icon.toggleClass("fe-eye fe-eye-off");
    }

    $("#newPassword, #confirmPassword").on("input", validatePasswordMatch);

    function validatePasswordMatch() {
        const newPassword = $("#newPassword").val();
        const confirmPassword = $("#confirmPassword").val();
        const warning = $("#passwordWarning");

        if (!confirmPassword) {
            warning.addClass("d-none");
            return;
        }

        if (newPassword !== confirmPassword) {
            warning.removeClass("d-none");
            $("#confirmPassword").addClass("is-invalid");
        } else {
            warning.addClass("d-none");
            $("#confirmPassword").removeClass("is-invalid");
        }
    }

    $("#profileUpdateForm").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "/admin/app-settings/profile-password/update",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response.message);
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
            },
        });
    });
});
