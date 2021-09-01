var serviceImageBlock = $('#serviceImageBlock');

function previewServiceImage(event) {
    var currentFile = event.files[0];
    console.log(currentFile)
    var imageData = URL.createObjectURL(currentFile);
    var imageSrc = '<img src="' + imageData + '">';
    serviceImageBlock.html(imageSrc);
}

var parentCategory = $('#parentCategory');

const childCategory = $('#childCategory');
const childCategoryBlock = $('#childCategoryBlock');
const allChildCategories = JSON.parse($('#allChildCategories').html());

parentCategory.change(function () {
    console.log($(this).val());
    console.log(allChildCategories)
    var options = `<option value="" selected>Select child category</option>`;
    if (allChildCategories.length > 0) {
        allChildCategories.forEach((option) => {
            if (option.parent == $(this).val()) {
                options += `<option value="` + option.id + `">` + option.name + `</option>`;
            }
        })
        childCategory.html(options);
        childCategoryBlock.show();
    } else {
        childCategory.html('');
        childCategoryBlock.hide();
    }
})


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