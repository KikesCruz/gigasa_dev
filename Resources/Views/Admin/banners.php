<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>



<main id="container-main">
    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php';
    ?>
    <section class="container">
        <div class="title-section">
            <h2> Cambiar Banners </h2>
        </div>
        <div class="container-section">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Banners</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <div class="text-center">
                            <p>Primer banner</p>
                        </div>
                        <div class="img">
                            <img class="img-fluid" src=" <?= URL_BASE . 'Public/Img/Admin/no_picture.png' ?> " alt="img">
                        </div>
                        <form id="form_banner_one" enctype="multipart/form-data">
                            <input name="banners" type="file" class="form-control" id="customFile" accept="image/jpeg, image/jpg, image/png" />
                            <button id="img-up" class="btn btn-success mt-2">Actualizar Imagen</button>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="text-center">
                            <p>Primer tercer</p>
                        </div>
                        <div class="img">
                            <img class="img-fluid" src=" <?= URL_BASE . 'Public/Img/Admin/no_picture.png' ?> " alt="img">
                        </div>
                    </div>
                    <input type="file" class="form-control" id="customFile" />
                </div>
                <div class="col-4">
                    <div class="container">
                        <div class="text-center">
                            <p>Primer tercer</p>
                        </div>
                        <div class="img">
                            <img class="img-fluid" src=" <?= URL_BASE . 'Public/Img/Admin/no_picture.png' ?> " alt="img">
                        </div>
                    </div>
                    <input type="file" class="form-control" id="customFile" />
                </div>
            </div>
        </div>

    </section>
</main>

<?php require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php'; ?>