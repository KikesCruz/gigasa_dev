<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>
<div class="wrapper">
    <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php'; ?>
    <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12 text-center mt-2">
                        <h1>Departamentos</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12 elevation-2">
                        <div class="row">
                            <div class="col box-widget">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Id:</th>
                                            <th>Departamentos</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($data as $depto) : ?>
                                            <tr id="tableDeptos">
                                                <td style="display: none;"><?= $depto['id_depto'] ?></td>
                                                <td><?= $depto['depto_name'] ?></td>
                                                <td><?= $depto['status_depto'] ?></td>
                                                <td>
                                                    <div class="group-btn">
                                                        <?= $depto['status_depto'] == 'off' ?
                                                        '<button id="btnEnableDepto" type="button" class="btn" data-toggle="modal" data-target="#enableModal"><i class="fa-solid fa-circle-check btn-enable-icon"></i></button>'
                                                            :
                                                            '<button id="btn-updateUsr" type="button" class="btn" data-toggle="modal" data-target="#modal_usr_update"><i class="fa-solid fa-pen-to-square btn-update-icon"></i></button>
                                                             <button id="btnDisableDepto" class="btn" data-toggle="modal" data-target="#disableModal"><i class="fa-solid fa-circle-minus btn-error-icon"></i></button>
                                                            '
                                                        ?>

                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col box-widget">
                                <form id="form_depto" class="form-horizontal">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="">Departamento:</label>
                                            <div class="col-sm-8">
                                                <input name="depto_name" class="form-control" type="text">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row p-2">
                                                <button 
                                                    id="add_depto"
                                                    type="submit"
                                                    class="btn-theme-one"> 
                                                    <i class="fa-solid fa-plus"></i>
                                                    Crear Nuevo
                                                </button>
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


    <!-- Modals area--->

    <!-- active modal -->
    <div class="modal fade" id="enableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro desea activar el departamento?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="body_modal_enable" class="body">

                </div>
            </div>
        </div>
    </div>

    <!-- disable modal -->

    <div class="modal fade" id="disableModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro desea desactivar el departamento?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="body_modal_disable" class="body">

                </div>
            </div>
        </div>
    </div>



    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
    ?>