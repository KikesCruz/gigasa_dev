<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>



<main id="container-main">
    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php';
    ?>
    <section class="container">
        <div class="title-section">
            <h2> DASHBOARD </h2>
            <?php var_dump($_SESSION) ?>
        </div>
        <div class="container-section">

        </div>
    </section>
</main>

<?php require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php'; ?>