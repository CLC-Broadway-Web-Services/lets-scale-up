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

        ul.nk-menu-sub {
            overflow: hidden;
            overflow-y: scroll;
            max-height: 80vh;
        }

        *::-webkit-scrollbar {
            background: #fff;
            width: 8px;
            height: auto;
        }

        *::-webkit-scrollbar-thumb {
            background: #c5c5c5;
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


    <?= $this->renderSection('javascript'); ?>
    <script>
        // if (tinymce) {
        tinymce.init({
            selector: ".tinymce_extended",
            paste_data_images: true,
            height: 400,
            branding: false,
            plugins: 'print preview importcss searchreplace autolink code autosave save directionality visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | a11ycheck ltr rtl | code',
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            importcss_append: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            spellchecker_whitelist: ['Lets Scale Up', 'LetsScaleUp'],
            content_style: '.mymention{ color: gray; }',
            contextmenu: 'link image imagetools table configurepermanentpen',
            a11y_advanced_options: true,
            // skin: useDarkMode ? 'oxide-dark' : 'oxide',
            // content_css: useDarkMode ? 'dark' : 'default',
            visualblocks_default_state: false,
            end_container_on_empty_block: true,

            // toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
            // toolbar2: "preview media | forecolor backcolor emoticons | link image | fullscreen",
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
            setup: function(editor) {
                editor.on('keydown', function() {
                    editor.save();
                });
                editor.on('keyup', function() {
                    editor.save();
                });
                editor.on('change', function() {
                    editor.save();
                });
            },
        });
        // }
        function imagePreview(event) {
            console.log(event.files[0]);
            console.log(event.id);
            const imageFile = event.files[0];
            if (imageFile) {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById(event.id + '_image');
                    output.src = reader.result;
                };
                reader.readAsDataURL(imageFile);
            }
        }

        function generateSlug(event, slugId) {
            const title = event.value;
            console.log(convertToSlug(title));
            $('#' + slugId).val(convertToSlug(title));
        }

        function convertToSlug(Text) {
            var slug = Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            var lastChar = slug[slug.length - 1];
            if (lastChar == '-') {
                slug = slug.slice(0, -1)
            }
            return slug;
        }
    </script>

</body>

</html>