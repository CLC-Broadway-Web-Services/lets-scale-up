<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="/public/dashboard/images/favicon.png">
    <title>Control Panel</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="/public/dashboard/assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="/public/dashboard/assets/css/theme.css?ver=2.2.0">
    <style>
        div#pageLoader {
            width: 100%;
            position: absolute;
            height: 100%;
            background: rgb(43 43 43 / 76%);
            z-index: 9999;
        }

        div#pageLoader>div {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <!-- page css -->
    <?php if (isset($pageCSS)) {
        echo $pageCSS;
    } ?>
</head>


<body class="nk-body bg-white npc-default has-aside" style="overflow:hidden;">
    <div id="pageLoader">
        <div class="d-flex justify-content-center">
            <div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.overflow = "hidden";
                document.querySelector(
                    "#pageLoader").style.overflow = "visible";
            } else {
                document.querySelector(
                    "#pageLoader").style.display = "none";
                document.querySelector(
                    "body").style.overflow = "visible";
            }
        };
    </script>

    <script>
        var dark_mode = localStorage.getItem('dark_mode');
        if (dark_mode) {
            document.body.classList.add("dark-mode");
        }
    </script>

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">

                <!-- Header START -->
                <?php echo view('Administrator/globals/headNav'); ?>
                <!-- Header END -->

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            <?php
                            $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                            if (isset($uriSegments[2])) :
                            ?>
                                <!-- Side Nav START -->
                                <?php echo view('Administrator/globals/sideNav'); ?>
                                <!-- Side Nav END -->
                            <?php endif ?>

                            <div class="nk-content-body">

                                <!-- MAIN CONTENT START -->
                                <?= $this->renderSection('content'); ?>
                                <!-- MAIN CONTENT END -->

                                <!-- Footer START -->
                                <?php echo view('Administrator/globals/footer'); ?>
                                <!-- Footer END -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content @e -->

            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="/public/dashboard/assets/js/bundle.js?ver=2.5.0"></script>
    <script src="/public/dashboard/assets/js/scripts.js?ver=2.5.0"></script>
    <script src="/public/dashboard/assets/js/charts/gd-default.js?ver=2.5.0"></script>

    <!-- page js -->
    <?php if (isset($pageJS)) {
        echo $pageJS;
    } ?>
</body>

</html>