<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $data['meta'] ?>
        <link rel="stylesheet" href="<?php echo Url::render('/assets/css/app-dark.min.css') ?>">
        <?php if ( count( $data['more_stylesheets'] ) ): ?>
            <?php foreach ( $data['more_stylesheets'] as $stylesheet ): ?>
                <link rel="stylesheet" href="<?php echo Url::render('assets/css/'.$stylesheet['href']) ?>" media="<?php echo $stylesheet['media'] ?>">
            <?php endforeach; ?>
        <?php endif; ?>
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo Url::render('/assets/css/archive.css') ?>">
    </head>
    <body class="loading0">
        <div class="wrapper">
            <?php echo $data['nav'] ?>
            <div class="content-page">
                <div class="content">
                    <div class="navbar-custom">            
                        <button class="button-menu-mobile open-left disable-btn">
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="container-fluid">
                    <?php echo $data['content'] ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo Url::render('/assets/js/vendor.min.js') ?>"></script>
        <script src="<?php echo Url::render('/assets/js/app.min.js') ?>"></script>
        <?php if ( count( $data['more_scripts'] ) ): ?>
            <?php foreach ( $data['more_scripts'] as $script ): ?>
                <script src="<?php echo Url::render('assets/js/'.$script['src']) ?>" <?php echo $script['async'] ?> <?php echo $script['defer'] ?> ></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>