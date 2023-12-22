<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/header.php'; ?>

<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Crear Cuenta</h1>
        </div>
    </div>
</section>

<!-- myaccount-section -->
<section class="myaccount-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                <img src="<?= URL_BASE.'Public/Img/Ecommers/Icons/account.png'?>" alt>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                <div class="inner-box signup-inner">
                    <div class="upper-inner">
                        <h3>información Personal</h3>

                    </div>
                    <form action="my-account.php" method="post" class="default-form">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Appelido Paterno</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Appelido Materno</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>RFC</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-controls-stacked">
                                <label class="custom-control material-checkbox">
                                    <input type="checkbox" class="material-control-input">
                                    <span class="material-control-indicator"></span>
                                    <span class="description">Acepto
                                        términos y políticas.</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="theme-button"> <span>Añadir
                                    <i class="fa-solid fa-cart-plus"></i>
                                </span> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- myaccount-section end -->

<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/footer.php'; ?>