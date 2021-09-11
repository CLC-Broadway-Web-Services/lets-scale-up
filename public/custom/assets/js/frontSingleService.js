var service_getstarted_form = $("#service_getstarted_form");
var serviceCheckoutForm = $("#serviceCheckoutForm");
var user_id = parseInt($("#user_id").val());
console.log(user_id)

$(document).ready(function () {
  service_getstarted_form.on("submit", function (event) {
    event.preventDefault();
    serviceGetStartedSubmition();
  });
  var userData = localStorage.getItem("service_user_details");
  if (userData) {
    var userdata = JSON.parse(userData);
    const now = new Date();
    // compare the expiry time of the item with the current time
    if (now.getTime() > userdata.expiry) {
      // If the item is expired, delete the item from storage
      // and return null
      localStorage.removeItem("service_user_details");
      return null;
    } else {
      console.log(userdata);
      for (var key in userdata) {
        $("#" + key).val(userdata[key])
      }
    }
  }
});

function saveFieldData(event) {
  var fieldName = "";
  fieldName = event.id;
  var userData = localStorage.getItem("service_user_details");
  var userdata = {};
  if (userData) {
    userdata = JSON.parse(userData);
    console.log(event.value);
    console.log(event.id);
    userdata[fieldName] = event.value;
    var stringifyArray = JSON.stringify(userdata);
    localStorage.setItem("service_user_details", stringifyArray);
  } else {
    console.log(event.value);
    console.log(event.id);
    userdata[event.id] = event.value;
    var stringifyArray = JSON.stringify(userdata);
    localStorage.setItem("service_user_details", stringifyArray);
  }
}

function serviceGetStartedSubmition() {
  //   var formData = new FormData(serviceGetStarted[0]);
  // console.log(service_getstarted_form.serializeArray());
  //   var formArray = Array.from(formData);

  const now = new Date();
  var formArray = {
    user_firstname: $("#user_firstname").val(),
    user_lastname: $("#user_lastname").val(),
    user_email: $("#user_email").val(),
    user_mobile: $("#user_mobile").val(),
    expiry: now.getTime() + 1800000,
  };
  var stringifyArray = JSON.stringify(formArray);

  localStorage.setItem("service_user_details", stringifyArray);

  window.location.href = "#packages";
}

if ($('.selectstate')) {
  if ($('.selectcity')) {
    $('.selectcity').parent().hide();
  }
  var statesJson = "/public/assets/json/states.json";
  fetch(statesJson).then(response => {
    return response.json();
  }).then(data => {
    console.log(data);
    var options = '';
    options += '<option selected value="">Select State</option>';
    data.forEach((state) => {
      options += '<option  value="' + state.id + '">' + state.name + '</option>';
    });
    $('.selectstate').html(options);
    if ($('.selectcity')) {
      $('.selectstate').on('change', function () {
        var stateId = $(this).val();
        console.log(stateId);
        var cityJson = "/public/assets/json/cities/" + stateId + ".json";
        fetch(cityJson).then(response => {
          return response.json();
        }).then(data => {
          console.log(data);
          var options = '';
          options += '<option selected value="">Select City</option>';
          data.forEach((state) => {
            options += '<option  value="' + state.id + '">' + state.name + '</option>';
          });
          $('.selectcity').html(options);
          $('.selectcity').parent().show();
        }).catch(err => {
        });
      })
    }
  }).catch(err => {
  });
}

if ($('.add_more_form_fields')) {
  $('.add_more_form_fields').on('click', function () {
    var id = $(this).attr('id');
    // var idNum = id.replace(/[^0-9]/g, '')
    // console.log(idNum);
    // console.log(parseInt(idNum));
    const template_div = $('#' + id + '_template');
    const input_wrapper = $('.' + id + '_wrapper');
    const initial_count = $('#' + id + '_count');
    var counting = parseInt(initial_count.html());
    var template = jQuery.validator.format(
      $.trim(template_div.html())
    );
    counting++;
    $(template(counting)).insertAfter($(input_wrapper).last());
    initial_count.html(counting);
  })
}

function initialCountAdding() {
  $('.initial_count').each(function (index) {
    var id = $(this).attr('id');
    var idNum = parseInt(id.replace(/[^0-9]/g, ''))
    console.log(idNum);
    const template_div = $('#more_fields_' + idNum + '_template');
    const input_wrapper = $('.more_fields_' + idNum + '_wrapper');
    const initial_count = $('#more_fields_' + idNum + '_count');
    var counting = parseInt(initial_count.html());
    if (counting > 1) {
      var template = jQuery.validator.format(
        $.trim(template_div.html())
      );
      counting++;
      $(template(counting)).insertAfter($(input_wrapper).last());
      initial_count.html(counting);
    }
    // console.log(parseInt(idNum));
  })
}
initialCountAdding();

if ($('.delete_more_form_fields')) {
  $(document).on('click', '.delete_more_form_fields', function () {
    $(this).parent().parent().remove();
    package_details_count--;
    $('#package_details_count').val(package_details_count);
  })
}
if (user_id == 0) {
  serviceCheckoutForm.submit(function (ev) {
    ev.preventDefault();
  })
}