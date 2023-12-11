<section class="sidebar">
    <nav class="navbarH">
        <div class="logo">
            <div class="icon-logo">
                <img src="<?= URL_BASE . 'Public/Img/icons/icon-horizontal.png';?> " alt="logo-admin">
            </div>
            <div class="logo-title">
                <h4>Admin</h4>
            </div>
        </div>
        <div class="container-menu">
            <ul class="menuOperations">
                <li class="item-menu"> <a href="./home"> <i class="fa-solid fa-chart-pie"></i>
                        DashBoard </a> </li>
                <li class="dropdown item-menu">
                    <a id="dropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="fa-solid fa-book"></i> Catalogo
                    </a>
                    <ul class="dropdown-menu menuDown">
                        <li>
                            <a href="./category">
                                Categorías
                            </a>
                        </li>
                        <li>
                            <a href="./subcategory">
                                Sub Categorías
                            </a>
                        </li>
                        <li>
                            <a href="./brands">
                                Marcas
                            </a>
                        </li>
                        <li>
                            <a href="./articulos">
                                Articulos
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="dropdown item-menu">
                    <a id="dropdown" class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                        <i class="fa-solid fa-shop"></i> Ecommers
                    </a>
                    <ul class="dropdown-menu menuDown">
                        <li>
                            <a href="./intvecommers">
                                Inventario
                            </a>
                        </li>
                        <li>
                            <a href="./subcategory">
                                Banners
                            </a>
                        </li>

                    </ul>

                </li>
            </ul>

        </div>
        <div class="profile">
            <div class="menu-profile">
                <ul class="profile-menu_group">
                    <li class="dropdown item-menu">
                        <a href="#" id="dropdown" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-id-card-clip"></i>
                            Nombre Apellido
                        </a>
                        <ul class="dropdown-menu menuDown">
                            <li class="item-menu">
                                <a href="#">
                                    Perfil
                                </a>
                            </li>
                            <li class="item-menu">
                                <a href="./">
                                    Cerrar Sesión
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>