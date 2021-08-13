var serviceImageBlock = $('#serviceImageBlock');


// document.getElementById('post_title').parentElement.append('<span id="post_description-error" class="invalid">T</span>');

function previewServiceImage(event) {
    var currentFile = event.files[0];
    console.log(currentFile)
    var imageData = URL.createObjectURL(currentFile);
    var imageSrc = '<img src="' + imageData + '">';
    serviceImageBlock.html(imageSrc);
}
function validateForm() {
    consoleForm($('#postForm'));
    var element = document.getElementById('post_description');
    var x = element.value;
    console.log('validation trigered');
    if (x == "") {
        var SPAN = document.createElement("span");
        SPAN.classList.add("customInvalid");
        SPAN.setAttribute('id', 'post_description-error');
        SPAN.innerHTML = 'This field is required.';
        element.parentElement.append(SPAN);
        return false;
    }
    return true;
}
tinymce.init({
    selector: "#post_description",
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});

function consoleForm(form) {
    var fomrData = new FormData(form[0]);
    console.log(Array.from(fomrData));
}
// serviceAddEditForm.submit(function (e) {
//     e.preventDefault();
//     var formData = new FormData(serviceAddEditForm[0]);

//     console.log(Array.from(formData));
//     //get the action-url of the form
//     // //do your own request an handle the results
//     $.ajax({
//         url: actionurl,
//         type: "post",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function (data) {
//             console.log(data)
//         },
//     });
// });