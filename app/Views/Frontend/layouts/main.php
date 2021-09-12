<!DOCTYPE html>
<html lang="en">
<?php

$pageTitle = APP_NAME;
$pageDescription = APP_DESCRIPTION;
$pageKeywords = APP_KEYWORDS;
$pageAuthor = APP_AUTHOR;
$pageOwner = APP_OWNER;
$pageType = APP_PAGE_TYPE;

if (isset($title)) {
    $pageTitle = $title;
}
if (isset($description)) {
    $pageDescription = $description;
}
if (isset($keywords)) {
    $pageKeywords = $keywords;
}
if (isset($author)) {
    $pageAuthor = $author;
}
if (isset($owner)) {
    $pageOwner = $owner;
}
if (isset($type)) {
    $pageType = $type;
}

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

    <!-- <link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Pe-icon-7 icon -->
    <!-- <link rel="stylesheet" type="text/css" href="/public/assets/css/pe-icon-7-stroke.css"> -->
    <!--Slider-->
    <!-- <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.transitions.css" /> -->
    <!-- magnific pop-up -->
    <!-- <link rel="stylesheet" type="text/css" href="/public/assets/css/magnific-popup.css" /> -->
    <!-- <link href="/public/assets/css/style.css" rel="stylesheet" type="text/css" /> -->
    <link href="/public/custom/assets/css/custom.css" rel="stylesheet" type="text/css" />

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
    <script src="/public/assets/js/jquery.magnific-popup.min.js"></script>
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

    <script type="text/javascript" src="/public/custom/assets/js/global_script.js"></script>

    <!-- page css -->
    <?php if (isset($pageJS)) {
        echo $pageJS;
    } ?>
    <?= $this->renderSection('javascript'); ?>

</body>

</html>