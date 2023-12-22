<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>
<div class="wrapper">
    <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php';  ?>
    <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/sidebar.php';  ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="ccontainer-fluid">
                <div class="row mb-2">
                    <div class="col-12 text-center mt-2">
                        <h1>Usuarios</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 rounded elevation-2">
                        <div class="row">
                            <div class="col-6 card-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Id:</th>
                                            <th>usuario</th>
                                            <th>Acciones</th>
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
                            <div class="col-6 card-body">
                                <form class="form-horizontal">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="">Usuario</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="">Contraseña</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn bg-add"> <i class="fa-solid fa-user-plus"></i> Crear Nuevo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
    ?>