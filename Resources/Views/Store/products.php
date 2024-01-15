<?php require PATH_ROOT . 'Resources/Views/Store/Shared/header.php'; ?>

<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Todos nuestros productos</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="./">Inicio</a></li>
                <li>Productos</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->
<section class="shop-page-section sidebar-page-container shop-page-2">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
                <div class="sidebar shop-sidebar">
                    <div class="sidebar-widget search-widget">
                        <form action="index.html" method="post" class="search-form">
                            <div class="form-group">
                                <input type="search" name="search-field" placeholder="Search..." required="">
                                <button type="submit"><i class="flaticon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-widget categories-widget">
                        <div class="widget-title">
                            <h3>Categorías</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="categories-list clearfix">
                                <li><a href="shop.php?pag=1">Todos los productos</a></li>
                                <li>
                                    <a href="shop.php?category=Aislantes térmicos&pag=1">
                                        Patente </a>
                                </li>
                                <li>
                                    <a href="shop.php?category=Anclas y herrajes&pag=1">
                                        Alimentos y Bebidas </a>
                                </li>
                                <li>
                                    <a href="shop.php?category=Automatización industrial&pag=1">
                                        Cuidado personal </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 content-side">
                <div class="sidebar-content">
                    <!---TITLE PRDUCTOS--->

                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left clearfix">
                            <div class="text">
                                <p>Mostrando 0 - 6 de 24 Resultados</p>
                            </div>
                        </div>
                    </div>
                    <!---SHOW PRODUCTOS--->
                    <div class="our-shop">
                        <div class="row clearfix">
                   
                                <?php foreach ($data['inventario'] as $key => $product): ?>
                   
                                <div class="col-lg-4 col-md-6 col-sm-12 mt-2">
                                    <div class="shop-block-one">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <a href="./product-details.html"> <img
                                                        src="<?= $product['img_url']['url_picture'] ?>" alt> </a>
                                            </figure>
                                            <div class="info-list">
                                                <a href="#">
                                                    <button class="theme-button"> <span>Añadir
                                                            <i class="fa-solid fa-cart-plus"></i>
                                                        </span> </button>
                                                </a>
                                            </div>
                                            <div class="lower-content">
                                                <div class="details">

                                                    <a href="product-details.html">
                                                        <?= $product['title_product'] ?>
                                                    </a>
                                                </div>
                                                <span class="price">$
                                                    <?= $product['details']['precio'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="pagination-wrapper centred">
                        <ul class="pagination clearfix">

                            <!--- NUMBERS -->
                            <li><a href="shop.php?&pag=1" class="active">1</a></li>
                            <li><a href="shop.php?&pag=2">2</a></li>
                            <li><a href="shop.php?&pag=3">3</a></li>
                            <li><a href="shop.php?&pag=4">4</a></li>
                            <li><a href="shop.php?&pag=2" class="siguiente">Siguiente</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require PATH_ROOT . 'Resources/Views/Store/Shared/footer.php'; ?>