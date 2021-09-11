var isSubmitting = false;

$(document).ready(function () {
    $('form').submit(function () {
        isSubmitting = true
    })

    $('form').data('initial-state', $('form').serialize());

    $(window).on('beforeunload', function () {
        if (!isSubmitting && $('form').serialize() != $('form').data('initial-state')) {
            return 'You have unsaved changes which will not be saved.'
        }
    });
})

submitForm = () => {
    const form = $("#settingsForm")
    const foormData = new FormData(form[0]);
    console.log(Array.from(foormData));

    $.ajax({
        method: 'post',
        data: foormData,
        processData: false,
        contentType: false,
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            console.log(JSON.parse(data));
            // window.location.reload();
            // window.location.href = "/administrator/service/forms";
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("Something Wrong Please Try Again");
        },
    })
}

updateProfile = () => {
    console.log('update profile clicked');
}
changePassword = () => {
    const old_password = $('#old_password');
    const new_password = $('#new_password');
    const confirm_password = $('#confirm_password');
    console.log('change password clicked');
}