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
            </ul>
        </div>
    </div>   
</nav>