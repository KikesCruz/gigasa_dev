<header>
    <nav class="navbar_top">
        <div class="navbar_top-logo">
            <img src=" <?= URL_BASE . 'Public/Img/Icons/icon-horizontal.png' ?>" alt>
        </div>
        <div class="burger__menu">
            <i class="fa-solid fa-bars icons-menu"></i>
        </div>
        <div class="navbar_top-search">
            <div class="input_container">
                <input type="text" placeholder="Buscar articulo">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="navbar_top-actions">
            <ul class="group_icons-menu">
                <li><a href="#">
                        <span>1</span>
                        <i class="fa-solid fa-cart-shopping icons-menu"></i>
                    </a></li>
                <li class="icon-profile">
                    <i class="fa-solid fa-user icons-menu"></i>
                    <ul class="drop-down profile">
                        <li><a href="./myprofile.html"> Iniciar Sesion </a></li>
                        <li><a href="./register.html"> Crear cuenta </a> </li>
                        <li><a href="#"> Perfil </a> </li>
                        <li><a href="#"> Cerrar sesion </a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="menu-mobile" class="navbar_menu">
        <div class="container-menu">
            <ul class="menu_one">
                <li><a href="#">Inicio</a></li>
                <li><a href="./somos.html">Nosotros</a></li>
                <li>
                    <a href="#">
                        Productos <i class="fa-solid fa-pills"></i>
                        <ul class="drop-down menu_two">

                            <?php foreach( $data as $key_cat => $cat) : ?>
                                <li>
                                    <a href="#"> <?= $cat['categoria'] ?> </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </a>
                </li>
                <li><a href="./contacto.html">Contacto</a></li>
            </ul>
        </div>
        <div id="close-menu-mobile" class="close_menu">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
    </div>
</header>