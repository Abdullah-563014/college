<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta data -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php if (isset($menuName) && $menuName == 'customlogin') {
    } else { ?>
        <meta name="robots" content="noindex">
    <?php } ?>
    <meta property="og:locale" content="en_US" />
    <meta http-equiv="content-language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?php echo siteFavicon(); ?>" type="image/x-icon" />
    <!-- SEO meta data -->
    <meta name="description" content="<?php if (isset($ogdescription)) {
                                            echo $ogdescription;
                                        } ?>" />
    <meta name="keywords" content="<?php if (isset($keywords)) {
                                        echo $keywords;
                                    } ?>" />
    <link rel="canonical" href="<?php if (isset($url)) {
                                    echo $url;
                                } ?>" />
    <meta itemprop="name" content="<?php if (isset($title)) {
                                        echo $title;
                                    } ?>" />
    <meta itemprop="description" content="<?php if (isset($ogdescription)) {
                                                echo $ogdescription;
                                            } ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="350" />
    <meta property="og:image:type" content="<?php if (isset($imageType)) {
                                                echo $imageType;
                                            } ?>" />
    <meta itemprop="thumbnail" content="<?php if (isset($image)) {
                                            echo $image;
                                        } ?>" />
    <meta itemprop="thumbnailUrl" content="<?php if (isset($image)) {
                                                echo $image;
                                            } ?>" />
    <link rel="image_src" href="<?php if (isset($image)) {
                                    echo $image;
                                } ?>" />
    <meta itemprop="embedURL" content="<?php if (isset($url)) {
                                            echo $url;
                                        } ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php if (isset($title)) {
                                                                echo $title;
                                                            } ?>" href="<?php if (isset($url)) {
                                                                            echo $url;
                                                                        } ?>" />
    <meta property="og:image" content="<?php if (isset($image)) {
                                            echo $image;
                                        } ?>" />
    <meta property="og:url" content="<?php if (isset($url)) {
                                            echo $url;
                                        } ?>" />
    <meta property="og:title" content="<?php if (isset($title)) {
                                            echo $title;
                                        } ?>" />
    <meta property="og:description" content="<?php if (isset($ogdescription)) {
                                                    echo $ogdescription;
                                                } ?>" />
    <meta property="og:keywords" content="<?php if (isset($keywords)) {
                                                echo $keywords;
                                            } ?>" />
    <meta property="og:site_name" content="<?php echo siteTitle(); ?>" />
    <meta property="og:updated_time" content="<?php if (isset($updated_time)) {
                                                    echo $updated_time;
                                                } ?>" />
    <meta name="twitter:description" content="<?php if (isset($ogdescription)) {
                                                    echo $ogdescription;
                                                } ?>" />
    <meta name="twitter:title" content="<?php if (isset($title)) {
                                            echo $title;
                                        } ?>" />
    <meta name="twitter:image" content="<?php if (isset($image)) {
                                            echo $image;
                                        } ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@<?php echo siteName(); ?>" />



    <title><?php if (isset($title)) {
                echo $title;
            } ?></title>




    <!-- bootstrap5 min css-->
    <script src="<?php echo siteUrl(); ?>/js/vendor/jquery.min.js"></script>
    <script src="<?php echo siteUrl(); ?>/js/vendor/jquery.ui.js"></script>
    <script src="<?php echo siteUrl(); ?>/js/vendor/popper.min.js"></script>
    <script src="<?php echo siteUrl(); ?>/js/vendor/jquery.simple.timer.js"></script>
    <script src="<?php echo siteUrl(); ?>/js/vendor/bootstrap.min.js"></script>
    <!-- <script src="<?php echo siteUrl(); ?>/js/main.js"></script> -->

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.3.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />


    <!-- bootstrap5 min css-->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/all.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/brands.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/brands.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/fontawesome.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/regular.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/regular.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/solid.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/solid.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/svg-with-js.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/svg-with-js.min.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/v4-shims.css" />
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/fontawesome-free/css/v4-shims.min.css" />
    <!-- default css -->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/vendor/default.css" />
      <!-- sathosi fonts css -->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/satoshi.css" />
    <!-- color css -->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/color.css" />
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo siteUrl(); ?>/css/style.css" />
    <meta name="theme-color" content="#fafafa" />



    <!-- blade file's css -->
    @stack('styles')



    <!--[if lt IE 9]>
            <script src="js/vendor/html5shiv.min.js"></script>
        <![endif]-->


</head>



<body>

    @yield('main_container')







    <!-- all script are below -->
    <script>
        let $csrfToken = "<?php echo csrf_token(); ?>";
        let $siteUrl = "<?php echo siteUrl(); ?>";
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "positionClass": "toast-bottom-center",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    <script src="<?php echo siteUrl(); ?>/js/main.js"></script>
    <script src="<?php echo siteUrl(); ?>/js/common.js"></script>

    @stack('js')
</body>

</html>