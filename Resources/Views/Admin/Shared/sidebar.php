<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-3">
    <!-- Brand Logo -->
    <div class="box-logo">
        <div class="box">
            <img src="<?= URL_BASE.'Public/Img/Ecommerce/Icons/Site/icon-vertical.png'?>" class="brand-image">
        </div>
        <div class="box">
            <span>Admin Panel</span>
        </div>
    </div>
    <!-- Brand Logo -->

    <!-- Sidebar Menu -->
    <nav class="mt-2 p-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/" class="nav-link link-side">
                    <i class="fa-solid fa-chart-pie icon-side"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Dropdown Menu -->
            <li class="nav-item">
                <a href="#" class="nav-link link-side">
                    <i class="fa-solid fa-book"></i>
                    <p>
                        Catalogo
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item sub-links">
                        <a href="./departamentos" class="nav-link">

                            <p>Departamentos</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="./categorias" class="nav-link">

                            <p>Categorías</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="./categorias" class="nav-link">

                            <p>Sub Categorías</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="./brands" class="nav-link">

                            <p>Marcas</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="../../index.html" class="nav-link">

                            <p>Productos</p>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- Dropdown Menu ends-->

            <!-- Dropdown Menu -->
            <li class="nav-item">
                <a href="#" class="nav-link link-side">
                    <i class="fa-solid fa-globe icon-side"></i>
                    <p>
                        Ecommer
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item sub-links">
                        <a href="../../index.html" class="nav-link">
                            <i class="fa-solid fa-images"></i>
                            <p>Banners</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="../../index.html" class="nav-link">
                            <i class="fa-solid fa-images"></i>
                            <p>Banners</p>
                        </a>
                    </li>

                    <li class="nav-item sub-links">
                        <a href="../../index.html" class="nav-link">
                            <i class="fa-solid fa-images"></i>
                            <p>Banners</p>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- Dropdown Menu ends-->

            <li class="nav-item">
                <a href="./users.html" class="nav-link link-side">
                    <i class="fa-solid fa-user icon-side"></i>
                    <p>Usuarios</p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar -->

</aside>