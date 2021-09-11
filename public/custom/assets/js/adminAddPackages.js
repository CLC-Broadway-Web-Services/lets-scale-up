const package_detail_input_wrapper = $('#package_detail_input_wrapper');
var encoded_package_details = [];
encoded_package_details = JSON.parse($('#encoded_package_details').html());
var package_details_count = $('#package_details_count').val();
const template_package_details = $('#template_package_details');
console.log(encoded_package_details.length);

if (encoded_package_details.length) {
  console.log('There is data');
} else {
  console.log('No data');
}


$(document).on('click', '.add_more', function () {
  var template = jQuery.validator.format(
    $.trim(template_package_details.html())
  );
  $(template(package_details_count)).insertAfter($('.package_detail_input_wrapper').last());
  package_details_count++;
  $('#package_details_count').val(package_details_count);
})

$(document).on('click', '.delete_this', function () {
  $(this).parent().remove();
  package_details_count--;
  $('#package_details_count').val(package_details_count);
})

initPackageDetail();

function initPackageDetail() {
  if (encoded_package_details.length) {
    const length = encoded_package_details.length - 1;
    for (let i = 0; i < length; i++) {
      var template = jQuery.validator.format(
        $.trim(template_package_details.html())
      );
      $(template(i + 1)).insertAfter($('.package_detail_input_wrapper').last());
    }
    if (encoded_package_details.length > 1) {
      encoded_package_details.forEach((item, index) => {
        $("#package_details_" + index).val(item);
      })
    } else {
      $("#package_details_0").val(encoded_package_details[0]);
    }
  }
}

// package_gst on package_shipping + package_basic_price
// package_price = including taxes

// package_basic_price => readonly
// package_gov_fee => 2932.00
// package_shipping => 60.00
// package_discount => 0.00
// package_gst => readonly
// package_price => 10999.00

// first input package_price
// then package_shipping
// then package_discount
// then package_gov_fee
// taxedAmount = package_price - (package_gov_fee & package_discount)
// getting package_gst = (taxedAmount/100)*18

// getting basePrice = package_price-(package_gov_fee+package_discount+package_gst+package_shipping)

$('.pricingInput').keyup(function () {
  const package_basic_price = $('#package_basic_price'),
    package_gov_fee = parseFloat($('#package_gov_fee').val()),
    package_shipping = parseFloat($('#package_shipping').val()),
    package_discount = parseFloat($('#package_discount').val()),
    package_gst = $('#package_gst'),
    package_price = parseFloat($('#package_price').val())

  var otherAmount = parseFloat(package_gov_fee + package_discount + package_shipping);

  if (package_price < otherAmount) {
    $('#package_gov_fee').val(0.00);
    $('#package_shipping').val(0.00);
    $('#package_discount').val(0.00);
    return;
  }

  console.log('package_basic_price', package_basic_price.val())
  console.log('package_gov_fee', package_gov_fee)
  console.log('package_shipping', package_shipping)
  console.log('package_discount', package_discount)
  console.log('package_gst', package_gst.val())
  console.log('package_price', package_price)

  var value = $(this);
  console.log(value.val())
  var taxedAmount = package_price - (package_gov_fee + package_discount)
  var gstAmount = (taxedAmount / 118) * 18
  var basePrice = package_price - (package_gov_fee + package_discount + gstAmount + package_shipping)
  console.log('taxedAmount', taxedAmount)
  console.log('gstAmount fixed', gstAmount.toFixed(2))
  console.log('gstAmount', gstAmount)
  console.log('basePrice', basePrice)
  package_gst.val(gstAmount.toFixed(2));
  package_basic_price.val(basePrice.toFixed(2));
})





















// tinymce.init({
//   selector: "textarea#package_details",
//   width: "100%",
//   height: 300,
//   plugins: [
//     "image imagetools advlist autolink link lists charmap print preview hr anchor pagebreak",
//     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//     "table emoticons template paste",
//   ],
//   toolbar:
//     "undo redo | link image | styleselect | bold italic | alignleft aligncenter alignright alignjustify | " +
//     "bullist numlist outdent indent | print preview media fullpage | " +
//     "forecolor backcolor emoticons",
//   menubar: "favs file edit view insert format tools table",
//   automatic_uploads: true,
//   file_picker_types: "image",
//   file_picker_callback: function (cb, value, meta) {
//     var input = document.createElement("input");
//     input.setAttribute("type", "file");
//     input.setAttribute("accept", "image/*");

//     /*
//           Note: In modern browsers input[type="file"] is functional without
//           even adding it to the DOM, but that might not be the case in some older
//           or quirky browsers like IE, so you might want to add it to the DOM
//           just in case, and visually hide it. And do not forget do remove it
//           once you do not need it anymore.
//         */

//     input.onchange = function () {
//       var file = this.files[0];

//       var reader = new FileReader();
//       reader.onload = function () {
//         /*
//                   Note: Now we need to register the blob in TinyMCEs image blob
//                   registry. In the next release this part hopefully won't be
//                   necessary, as we are looking to handle it internally.
//                 */
//         var id = "blobid" + new Date().getTime();
//         var blobCache = tinymce.activeEditor.editorUpload.blobCache;
//         var base64 = reader.result.split(",")[1];
//         var blobInfo = blobCache.create(id, file, base64);
//         blobCache.add(blobInfo);

//         /* call the callback and populate the Title field with the file name */
//         cb(blobInfo.blobUri(), { title: file.name });
//       };
//       reader.readAsDataURL(file);
//     };

//     input.click();
//   },
//   init_instance_callback: function (editor) {
//     // update validation status on change`
//     editor.on("Change", function (e) {
//       tinyMCE.triggerSave();
//     });
//   },
// });