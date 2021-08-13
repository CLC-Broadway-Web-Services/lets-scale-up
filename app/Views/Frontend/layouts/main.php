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
    <meta charset="utf-8" />
    <title><?= $pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $pageDescription ?>" />
    <meta name="keywords" content="<?= $pageKeywords ?>" />
    <meta name="author" content="<?= $pageAuthor ?>" />
    <meta name="owner" content="<?= $pageOwner ?>" />
    <meta name="type" content="<?= $pageType ?>" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/assets/images/favicon.ico">
    <!-- css -->
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Pe-icon-7 icon -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/pe-icon-7-stroke.css">
    <!--Slider-->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="/public/assets/css/owl.transitions.css" />
    <!-- magnific pop-up -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/magnific-popup.css" />
    <link href="/public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/public/custom/assets/css/custom.css" rel="stylesheet" type="text/css" />

    <!-- page css -->
    <?php if (isset($pageCSS)) {
        echo $pageCSS;
    } ?>

</head>

<body data-spy="scroll" data-target="#navbarCollapse">



    <?php echo view('Frontend/globals/topbar'); ?>
    <?php echo view('Frontend/globals/navigation'); ?>

    <!--page here-->
    <?= $this->renderSection('content'); ?>
    <!--page here-->

    <?php echo view('Frontend/globals/footer'); ?>


    <!-- javascript -->
    <script src="/public/assets/js/jquery.min.js"></script>
    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/public/assets/js/jquery.easing.min.js"></script>
    <script src="/public/assets/js/jquery.mb.YTPlayer.js"></script>
    <!-- Portfolio -->
    <script src="/public/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- contact init -->
    <script src="/public/assets/js/contact.init.js"></script>
    <!-- counter init -->
    <!-- <script src="/public/assets/js/counter.init.js"></script> -->
    <!-- Owl Carousel -->
    <script src="/public/assets/js/owl.carousel.min.js"></script>

    <!-- page css -->
    <?php if (isset($pageJSbefore)) {
        echo $pageJSbefore;
    } ?>
    <script src="/public/assets/js/app.js"></script>

    <script type="text/javascript" src="/public/custom/assets/js/global_script.js"></script>

    <!-- page css -->
    <?php if (isset($pageJS)) {
        echo $pageJS;
    } ?>

</body>

</html>