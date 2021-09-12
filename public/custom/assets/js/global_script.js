
// login & registration here with go to last last URL feature

const loadingElementForButton = `<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>`;

if (document.getElementById('loginModal')) {
    var options = {
        backdrop: 'static'
    }
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), options)
    function openLogin() {
        loginModal.show()
    }
    function showLogin() {
        var loginTab = document.querySelector('#login-tab')
        var tab = new bootstrap.Tab(loginTab)
        tab.show()
    }
    function showRegister() {
        var registerTab = document.querySelector('#register-tab')
        var tab2 = new bootstrap.Tab(registerTab)
        tab2.show()
    }


    const loginForm = $('#loginForm');
    const registerForm = $('#registerForm');

    // login form process
    loginForm.submit(function (el) {
        el.preventDefault();
        const submitButton = $("button[type=submit]", this);
        const formLoader = $("div.formLoader", this);
        
        formLoader.show();

        submitButton.html(loadingElementForButton + ' submitting');
        submitButton.attr('disabled', true);
        const formData = new FormData(loginForm[0]);
        formData.append('type', 'ajax')
        formData.append('history_url', window.location.pathname)
        console.log(Array.from(formData));
        $.ajax({
            url: '/auth/login',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (response) {
            console.log(JSON.parse(response))
            const res = JSON.parse(response);
            if (res.success) {
                location.reload();
            } else {
                let message = res.message;
                const listItems = checkHTML(message);
    
                var loginErrors = document.getElementById('loginErrors')
                for (let i = 0; i <= listItems.length - 1; i++) {
                    var wrapper = document.createElement('div')
                    wrapper.innerHTML = '<div class="alert alert-danger alert-dismissible" role="alert">' + listItems[i].innerHTML + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    loginErrors.append(wrapper)
                    console.log(listItems[i].innerHTML);
                }
                formLoader.hide();
                submitButton.html('Submit');
                submitButton.removeAttr('disabled');
            }
        })
    })
    // registration form process
    registerForm.submit(function (el) {
        el.preventDefault();
        const submitButton = $("button[type=submit]", this);
        const formLoader = $("div.formLoader", this);
        
        formLoader.show();

        submitButton.html(loadingElementForButton + ' submitting');
        submitButton.attr('disabled', true);
        const formData = new FormData(registerForm[0]);
        formData.append('type', 'ajax')
        formData.append('history_url', window.location.pathname)
        console.log(Array.from(formData));
        $.ajax({
            url: '/auth/register',
            method: 'post',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (response) {
            console.log(JSON.parse(response))
            const res = JSON.parse(response);
            if (res.success) {
                var loginErrors = document.getElementById('loginErrors')
                loginErrors.innerHTML = '<div class="alert alert-success alert-dismissible" role="alert">Registration suuccesful, please login.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                showLogin();
                registerForm.get(0).reset();
                formLoader.hide();
                submitButton.html('Submit');
                submitButton.removeAttr('disabled');
                // location.reload();
            } else {
                let message = res.message;
                const listItems = checkHTML(message);
    
                var registerErrors = document.getElementById('registerErrors')
                for (let i = 0; i <= listItems.length - 1; i++) {
                    var wrapper = document.createElement('div')
                    wrapper.innerHTML = '<div class="alert alert-danger alert-dismissible" role="alert">' + listItems[i].innerHTML + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    registerErrors.append(wrapper)
                    console.log(listItems[i].innerHTML);
                }
                formLoader.hide();
                submitButton.html('Submit');
                submitButton.removeAttr('disabled');
            }
        })
    })
}

var checkHTML = function (html) {
    var doc = document.createElement('div');
    doc.innerHTML = html;
    const listItems = doc.getElementsByTagName('li');
    return listItems;
    // return (doc.innerHTML === html);
}

if($("table").hasClass("datatable")) {
    $('.datatable').DataTable();
}

//   // Add slideDown animation to Bootstrap dropdown when expanding.
//   $('.dropdown').on('show.bs.dropdown', function() {
//     $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
//   });

//   // Add slideUp animation to Bootstrap dropdown when collapsing.
//   $('.dropdown').on('hide.bs.dropdown', function() {
//     $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
//   });