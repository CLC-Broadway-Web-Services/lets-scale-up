<!DOCTYPE html>
<html lang="en">
<?php

// $pageTitle = APP_NAME;
// $pageDescription = APP_DESCRIPTION;
// $pageKeywords = APP_KEYWORDS;
// $pageAuthor = APP_AUTHOR;
// $pageOwner = APP_OWNER;
// $pageType = APP_PAGE_TYPE;

// if (isset($meta)) {
$pageTitle = isset($meta) && $meta->title ? $meta->title . ' | ' . APP_NAME : APP_NAME;
$pageDescription = isset($meta) && $meta->description ? $meta->description : APP_DESCRIPTION;
$pageKeywords = isset($meta) && $meta->keywords ? $meta->keywords : APP_KEYWORDS;
$pageAuthor = isset($meta) && $meta->author ? $meta->author : APP_AUTHOR;
$pageOwner = isset($meta) && $meta->owner ? $meta->owner : APP_OWNER;
$pageType = isset($meta) && $meta->type ? $meta->type : APP_PAGE_TYPE;
// }
// if (isset($description)) {
//     $pageDescription = $description;
// }
// if (isset($keywords)) {
//     $pageKeywords = $keywords;
// }
// if (isset($author)) {
//     $pageAuthor = $author;
// }
// if (isset($owner)) {
//     $pageOwner = $owner;
// }
// if (isset($type)) {
//     $pageType = $type;
// }

?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $pageDescription ?>" />
    <meta name="keywords" content="<?= $pageKeywords ?>" />
    <meta name="author" content="<?= $pageAuthor ?>" />
    <meta name="owner" content="<?= $pageOwner ?>" />
    <meta name="type" content="<?= $pageType ?>" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/assets/images/favicon.ico">

    <!-- Loading Bootstrap -->
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Template CSS -->
    <link href="/public/assets/css/style.css" rel="stylesheet">
    <link href="/public/assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="/public/assets/css/animate.css" rel="stylesheet">
    <link href="/public/assets/css/style-magnific-popup.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Open+Sans:ital@0;1&display=swap" rel="stylesheet">
    <link href="/public/custom/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <link rel='stylesheet' type='text/css' href='/public/libraries/DataTables/datatables.min.css' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <style>
        #services .feature-box {
            height: 100%;
            margin-top: 0 !important;
        }

        #services .service_title>h4 {
            line-height: 1.1;
            position: absolute;
            max-width: 100%;
            bottom: 1px;
        }

        #services .service_title {
            position: relative;
            height: 42px;
        }
    </style>
    <!-- page css -->
    <?php if (isset($pageCSS)) {
        echo $pageCSS;
    } ?>

</head>


<body data-spy="scroll" data-target="#navbarCollapse">

    <?php echo view('Frontend/globals/header'); ?>

    <main>

        <!--page here-->
        <?= $this->renderSection('content'); ?>
        <!--page here-->

        <?php echo view('Frontend/globals/footer'); ?>

    </main>

    <!-- Load JS here for greater good =============================-->
    <script src="/public/assets/js/jquery-3.6.0.min.js"></script>
    <script src="/public/assets/js/bootstrap.min.js"></script>
    <script src="/public/assets/js/jquery.scrollTo-min.js"></script>
    <!-- <script src="/public/assets/js/jquery.magnific-popup.min.js"></script> -->
    <script src="/public/assets/js/jquery.nav.js"></script>
    <script src="/public/assets/js/wow.js"></script>
    <script src="/public/assets/js/typed.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script> -->
    <script src="/public/assets/js/plugins.js"></script>
    <script src="/public/assets/js/custom.js"></script>

    <!-- page css -->
    <?php if (isset($pageJSbefore)) {
        echo $pageJSbefore;
    } ?>

    <script type='text/javascript' src='/public/libraries/DataTables/datatables.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script type="text/javascript" src="/public/custom/assets/js/global_script.js"></script>

    <!-- page css -->
    <?php if (isset($pageJS)) {
        echo $pageJS;
    } ?>
    <?= $this->renderSection('javascript'); ?>

    <script>
        if ($("table").hasClass("datatable")) {
            $('.datatable').DataTable({
                "pagingType": "numbers",
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
        }
        new Splide('#splide', {
            autoplay: true,
            interval: 3000,
            perPage: 4,
            gap: '1em',
            arrows: false,
            type: 'loop',
            pagination: false,
            breakpoints: {
                1024: {
                    perPage: 3,
                },
                740: {
                    perPage: 2,
                },
                420: {
                    perPage: 1,
                },
            }
        }).mount();

        var userNameInput = $('#newsletterFullName');
        var userEmailInput = $('#newsletterEmail');

        var newsLetterUserNameVerify = false;
        userNameInput.on('keyup', function() {
            validatUserName($(this));
        })
        var newsLetterEmailVerify = false;
        userEmailInput.on('keyup', function() {
            validateUserEmail($(this));
        })
        var newsletterResponseColumn = $('#newsletterResponseColumn');
        var newsletterResponseAlert = $('#newsletterResponseAlert');
        var newsletterResponseMessage = $('#newsletterResponseMessage');
        var newsletterResponseClose = $('#newsletterResponseClose');

        newsletterResponseClose.on('click', function() {
            closeAlert();
        })

        function closeAlert() {
            newsletterResponseMessage.html('');
            if (newsletterResponseAlert.hasClass('alert-warning')) {
                newsletterResponseAlert.removeClass('alert-warning')
            }
            if (newsletterResponseAlert.hasClass('alert-primary')) {
                newsletterResponseAlert.removeClass('alert-primary')
            }
            if (newsletterResponseAlert.hasClass('alert-danger')) {
                newsletterResponseAlert.removeClass('alert-danger')
            }
            if (newsletterResponseAlert.hasClass('alert-info')) {
                newsletterResponseAlert.removeClass('alert-info')
            }
            if (newsletterResponseAlert.hasClass('alert-success')) {
                newsletterResponseAlert.removeClass('alert-success')
            }
            newsletterResponseColumn.hide();
        }

        function showNewsletterResponse(message, alertclass) {
            closeAlert();
            newsletterResponseMessage.html(message);
            newsletterResponseAlert.addClass(alertclass);
            newsletterResponseColumn.show();
            setTimeout(() => {
                newsletterResponseColumn.hide();
            }, 5000);
        }

        $('#newsletterSubmit').on('click', function(ev) {
            ev.preventDefault();
            if (validatUserName(userNameInput) && validateUserEmail(userEmailInput)) {
                var buttonSpinner = '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Subscribing...';
                $('#newsletterSubmit').html(buttonSpinner);
                $.ajax({
                    url: '/ajax/newsletter-subscribe',
                    method: 'post',
                    data: {
                        username: userNameInput.val(),
                        useremail: userEmailInput.val()
                    },
                    success: function(data) {
                        console.log(data);
                        data = JSON.stringify(data);
                        console.log(data);
                        data = JSON.parse(data);
                        console.log(data);
                        $('#newsletterSubmit').html('Subscribe to newsletter');
                        const res = JSON.parse(data);
                        console.log(res.class);
                        var aClass = 'alert-' + res.class;
                        showNewsletterResponse(res.message, aClass);
                    }
                })
            }
        })

        function validatUserName(name) {
            if (!name.val() || name.val().length < 8) {
                name.addClass('is-invalid');
                return false;
            } else {
                if (name.hasClass('is-invalid')) {
                    name.removeClass('is-invalid');
                    return false;
                }
                name.addClass('is-valid');
                return true;
            }
        }

        function validateUserEmail(email) {
            var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!email.val() || email.val().length < 8) {
                email.addClass('is-invalid');
                return false;
            } else {
                if (!regex.test(email.val())) {
                    email.addClass('is-invalid');
                    return false;
                } else {
                    if (email.hasClass('is-invalid')) {
                        email.removeClass('is-invalid');
                        return false;
                    }
                    email.addClass('is-valid');
                    return true;
                }
            }
        }
    </script>
</body>

</html>