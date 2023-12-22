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
                                <th style="display: none;">Id:</th>
                                <th>Usuario:</th>
                                <th>Estatus:</th>
                                <th>Acciones:</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $usr) : ?>
                                <tr id="tb_usr">
                                    <td style="display: none;"> <?= $usr['id_user'] ?> </td>
                                    <td> <?= $usr['user_name'] ?> </td>
                                    <td> <?= $usr['user_status'] ?> </td>

                                    <td>
                                        <div class="group-btn">
                                            <?= $usr['user_status'] == 'inactive' ?
                                                '<button id="btn-activeUsr" type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#modal_usr_active"><i class="fa-solid fa-user-check"></i></button>'
                                                :
                                                '<button id="btn-updateUsr" type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#modal_usr_update"><i class="fa-solid fa-user-pen"></i></button>
                                             <button id="btn-downUsr" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#modal_usr_down"><i class="fa-solid fa-user-xmark"></i></button>
                                            '
                                            ?>

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
                            <input name="usr_name" type="text" class="form-control" placeholder="Ingrese nombre de usuario">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contraseña:</label>
                            <input name="usr_pass" type="password" class="form-control" placeholder="Escriba una contraseña">
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

<!-- modals sections -->

<!-- update modal -->
<div class="modal fade" id="modal_usr_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Editar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modal_info_usr" class="modal-body">


            </div>
            <div id="alert_err-update" class="alert_ms alert-danger mt-1 text-center" role="alert">
                campo vacío!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-delete" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<!-- #borrar modal -->

<div class="modal fade" id="modal_usr_down" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Desactivar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="inf_usr_down" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-delete" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

<!-- #borrar active -->
<div class="modal fade" id="modal_usr_active" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> Activar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  class="modal-body">
                <p>¿Desea volver a activar este usuario?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-delete" data-bs-dismiss="modal">Cerrar</button>
                <button 
                id="btn_conf_active"
                type="button" class="btn btn-delete" data-bs-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>




<?php require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php'; ?>