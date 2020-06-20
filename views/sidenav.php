<?php 

$request_uri = trim($_SERVER['REQUEST_URI'], '/');
$request = str_replace( '20481536', '', $request_uri );

$routes = ArchiveApp::getRoutes();
$baseUrl = ArchiveApp::getConfig('redirect_base');

$links = [];
$children = [];
$grandChildren = [];
foreach ($routes as $path => $route) {

    $parts = explode('/', $path);
    $key = $parts[0];
    if ( $route['visible'] ) {
        $links[$key] = [
            'title'     => ucwords(str_replace('-', ' ', $key)),
            'link'      => $path
        ];
    
        if ( count($parts) > 1 ) {
            $key2 = $parts[1];
            $children[$key][$key2] = [
                'title' => ucwords(str_replace('-', ' ', $key2)),
                'link' => $path
            ];
    
            if (count($parts) > 2) {
                $key3 = $parts[2];
                $grandChildren[$key2][$key3] = [
                    'title' => ucwords(str_replace('-', ' ', $key3)),
                    'link' => $path
                ];
            }
        }
    }
}

?>
<div class="left-side-menu">
    <div class="h-100" id="left-side-menu-container" data-simplebar>
        <a href="<?php echo Url::render('/') ?>" class="logo text-center">
            <span class="logo-lg <?php echo ( trim($baseUrl, '/') === $request_uri ? ' active' : '' ) ?>">
                <?php echo ArchiveApp::getConfig('app_title') ?>
            </span>
        </a>
        <ul class="metismenu side-nav">
        <?php foreach ( $links as $key => $link ): ?>
            <li class="side-nav-item">
            <?php if ( array_key_exists( $key, $children ) ): ?>
                <a href="javascript: void(0);" class="side-nav-link">
                    <span> <?php echo $link['title'] ?> </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <?php foreach ( $children[$key] as $childkey => $child ): ?>
                    <li class="side-nav-item">
                        <?php if ( array_key_exists( $childkey, $grandChildren ) ): ?>
                            <a href="javascript: void(0);" aria-expanded="false">
                            <span> <?php echo $child['title'] ?> </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-third-level" aria-expanded="false">
                            <?php foreach ( $grandChildren[$childkey] as $grandChild ): ?>
                            <li><a href="<?php echo Url::render($grandChild['link']) ?>"><?php echo $grandChild['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                            <a href="<?php echo Url::render($child['link']) ?>" aria-expanded="false">
                                <span> <?php echo $child['title'] ?> </span>
                            </a>
                        <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <a href="<?php echo Url::render($link['link']) ?>" class="side-nav-link">
                    <span> <?php echo $link['title'] ?> </span>
                </a>
            <?php endif; ?>
            </li>
        <?php endforeach ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>