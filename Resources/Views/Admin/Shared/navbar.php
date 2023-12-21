<section class="sidebar">
    <nav class="navbarH">
        <div class="logo">
            <div class="icon-logo">
                <img src="<?= URL_BASE . 'Public/Img/Icons/icon-horizontal.png'; ?> " alt="logo-admin">
            </div>
            <div class="logo-title">
                <h4>Admin</h4>
            </div>
        </div>
        <div class="container-menu">
            <ul class="menuOperations">

                <li class="dropdown item-menu">
                    <a id="dropdown" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-shop"></i> Ecommers
                    </a>
                    <ul class="dropdown-menu menuDown">
                        <li>
                            <a href="./provedores">
                                Proovedores
                            </a>
                        </li>
                        <li>
                            <a href="./banners">
                                Banners
                            </a>
                        </li>
                        <li>
                            <a href="./users">
                                Usuarios
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="item-menu">
                    <a>
                        <i class="fa-solid fa-truck"></i>

                        </i> Inventario
                    </a>

                </li>
                <li class="item-menu">
                    <a>
                        <i class="fa-solid fa-users"></i> Clientes
                    </a>

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
                                <a href="/admin/profile">
                                    Perfil
                                </a>
                            </li>
                            <li class="item-menu">
                                <a href="/admin">
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