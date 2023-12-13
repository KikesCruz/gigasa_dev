<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>



<main id="container-main">
    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php';
    ?>
    <section class="container">
        <div class="title-section">
            <h2> Usuarios </h2>

        </div>
        <div class="container-section">
            <div class="row p-4">
                <div class="col-6">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Usuario:</th>
                                <th>Estatus:</th>
                                <th>Contraseña:</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $usr) : ?>
                                <tr id="table-cat">
                                    <td> <?= $usr['user_name'] ?> </td>
                                    <td> <?= $usr['user_status'] ?> </td>
                                    <td> <?= $usr['user_pass'] ?> </td>
                                    <td>
                                        <div class="group-btn">
                                            <button id="btn-updateCat" type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#modalEditCat">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button id="btn-deleteCat" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#modalDeleteCat">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <form id="form_user">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Usario:</label>
                            <input 
                            name="usr_name"
                            type="text" class="form-control"  placeholder="Ingrese nombre de usuario">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contraseña:</label>
                            <input 
                            name="usr_pass"
                            type="password" class="form-control"  placeholder="Escriba una contraseña">
                        </div>
                        <div class="mb-3">
                            <button id="add_user" class="btn btn-success">Crear Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php'; ?>