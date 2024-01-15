<?php require PATH_ROOT . 'Lib/Navbar.php';
?>

<!-- Desktop menu start-->
<header>
        <nav>
            <div class='logo'>
                <a href='./'>
                    <img src="<?= URL_BASE. 'Public/Img/Store/Icons/Site/icon-horizontal.png'?>" alt='logo' />
                </a>
            </div>
            <div class='container-form_search'>
                <form action='#' class='search-form'>
                    <input type='text' placeholder='Buscar Articulo' />
                </form>
            </div>
            <div class='menu_navigations'>
                <ul class='icons-menu'>
                    <li>
                        <a href='./cart' class='position-relative'><i class='fa-solid fa-cart-shopping'></i>
                            <span class='position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger'>4</span>
                        </a>
                    </li>
                    <li class='drowp_menu'>
                        <a href='#'><i class='fa-solid fa-user'></i>
                            <ul class='menu_user'>
                                <li>
                                    <a href='./account'>Iniciar Sesion </a>
                                </li>
                                <li>
                                    <a href='./profile'>Mi cuenta</a>
                                </li>
                                <li>
                                    <a href='./'>Salir</a>
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class='navbar-bottom'>
        <ul class='box_navbar_bottom'>
            <li class='drowp_menu'>
                <a href='#'>Productos <i class='fa-solid fa-caret-down'></i></a>
                <ul class='menu_category'>
                    <?php foreach( Navbar::menu() as $value) : ?>
                    
                    <li><a href="#"><?=$value?> </a></li>

                    <?php endforeach; ?>

                   
                </ul>
            </li>
            <li><a href='#'>Nosotros</a></li>
            <li><a href='#'>Contáctenos</a></li>
        </ul>
    </div>
    <!-- Desktop menu end-->

    <!-- #Mobile menu Start-->

    <div class='navbar-mobile'>
        <div id='mobile_menu' class='icon-mobile-menu'>
            <i class='fa-solid fa-bars'></i>
        </div>
        <div class='box-search'>
            <form action class='search_form'>
                <input type='text' placeholder='Buscar articulo' />
            </form>
        </div>
        <div class='icon-mobile-menu'>
            <a href='./cart.html'>
                <i class='fa-solid fa-cart-shopping'></i>
            </a>
        </div>
    </div>
    <div id='mobile_menu_options' class='mobile_menu'>
        <ul>
            <li>
                <a href='./profile.html'><i class='fa-solid fa-user'></i> Mi
                    Cuenta</a>
            </li>
            <li>
                <a href='#'><i class='fa-solid fa-pills'></i> Mis Pedidos</a>
            </li>
            <li>
                <a href='#'><i class='fa-solid fa-list'></i> Categorias</a>
            </li>
            <li>
                <a href='#'><i class='fa-solid fa-id-card-clip'></i> Contactanos</a>
            </li>
            <li>
                <a href='#'><i class='fa-solid fa-people-group'></i> Somos </a>
            </li>
            <li>
                <a href='./'><i class='fa-solid fa-right-from-bracket'></i> Cerrar
                    Sesion</a>
            </li>
        </ul>
    </div>
    <!-- Mobile menu end -->