<?php 

$request_uri = trim($_SERVER['REQUEST_URI'], '/');
$request = str_replace( '20481536', '', $request_uri );

$routes = ArchiveApp::getRoutes();


$links = [];
$children = [];
$grand_children = [];
foreach ($routes as $path => $route) {

    $parts = explode('/', $path);
    $key = $parts[0];

    $links[$key] = [
        'title' => ucwords(str_replace('-', ' ', $key)),
        'link' => $path,
    ];

    if ( count($parts) > 1 ) {
        $key2 = $parts[1];
        $children[$key][$key2] = [
            'title' => ucwords(str_replace('-', ' ', $key2)),
            'link' => $path,
        ];

        if (count($parts) > 2) {
            $key3 = $parts[2];
            $grand_children[$key2][$key3] = [
                'title' => ucwords(str_replace('-', ' ', $key3)),
                'link' => $path
            ];
        }
    }
}

//echo '<pre style="color:#FFF">';
//var_dump($links);
//var_dump($children);
//var_dump($grand_children);
//echo '</pre>';

?>
<style>

.dropdown-submenu {
    position: relative;
  }
  .dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
  }
  .dropdown-submenu:hover > .dropdown-menu {
    display: block;
  }
  .dropdown-submenu:hover > a:after {
    border-left-color: #fff;
  }
  .dropdown-submenu.pull-left {
    float: none;
  }
  .dropdown-submenu.pull-left > .dropdown-menu {
    left: -100%;
    margin-left: 10px;
  }
  
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo Url::render('/') ?>">Devotions</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColl" aria-controls="navbarColl" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColl">
            <ul class="navbar-nav ml-auto">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">				          
                        <li><a href="#">Link</a></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Second Level Menu ! <i class="fa fa-chevron-right"></i></a>
                            <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">Link 1</a></li>			                  
                            <li><a href="#">Lik 2</a></li>
                            <li><a href="#">Link 3</a></li>
                            </ul>
                        </li>			            
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </li> <!-- .dropdown -->		


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="aqqww" data-toggle="dropdown">aaaaa</a>
                    <div class="dropdown-menu" aria-labelledby="aqqww">
                        <ul>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Action</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>


                <?php foreach ( $links as $key => $link ): 
                    $is_active = ( $link['link'] == $request ? ' active' : ''); 
                    $is_dropdown = ( array_key_exists($key, $children) ? ' dropdown dropwide' : ''); 
                    ?>

                    <li class="nav-item<?php echo $is_active ?><?php echo $is_dropdown ?>">
                    <?php if ( array_key_exists($key, $children) ): ?>
                        <a class="nav-link dropdown-toggle" href="#" id="<?php echo $link['link'] ?>w" data-toggle="dropdown"><?php echo $link['title'] ?></a>
                        <div class="dropdown-menu" aria-labelledby="<?php echo $link['link'] ?>w">
                        <?php foreach ( $children[$key] as $child ):  $is_child_active = ( $child['link'] == $request ? ' active' : ''); ?>
                            <a class="dropdown-item <?php echo $is_child_active ?>" href="<?php echo Url::render($child['link']) ?>"><?php echo $child['title'] ?></a>
                        <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropnarrow<?php echo $is_active ?>">
                        <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#<?php echo $link['link'] ?>"><?php echo $link['title'] ?></a>
                        <div class="collapse" id="<?php echo $link['link'] ?>" >
                        <?php foreach ( $children[$key] as $child ): $is_child_active = ( $child['link'] == $request ? ' active' : '');  ?>
                            <a class="dropdown-item <?php echo $is_child_active ?>" href=<?php echo Url::render($child['link']) ?>"><?php echo $child['title'] ?></a>
                        <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <a class="nav-link" href="<?php echo Url::render($link['link']) ?>"><?php echo $link['title'] ?></a>
                    <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>   
</nav>