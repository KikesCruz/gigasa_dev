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
      <div class="container-box">

        <div class="box">
          <table id="tb_deptos" class="table table-bordered">
            <thead>
              <tr>
                <th>#ID Depto</th>
                <th>Departamentos</th>
                <th>Estatus</th>
                <th>Web</th>
                <th>Img</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data as $depto) : ?>
                <tr id="tableDeptos">
                  <td><?= $depto['id_depto'] ?></td>
                  <td><?= $depto['depto_name'] ?></td>
                  <td><?= $depto['status_depto'] ?></td>
                  <td>

                    <?php if ($depto['path_img'] != 'url_empty') : ?>
                      <?= $depto['view_web'] == 'off' ?
                        '<button 
                     id="btnOnWeb" 
                     type="button" 
                     class="btn" 
                     data-toggle="modal" 
                     data-target="#onWeb">
                     <i class="fa-solid fa-store"></i>
                     </button>'
                        :
                        '<button 
                     id="btnOffWeb" 
                     type="button" 
                     class="btn" 
                     data-toggle="modal" 
                     data-target="#offWeb">
                     <i class="fa-solid fa-store-slash btn-error-icon"></i>
                     </button>'
                      ?>
                    <?php endif; ?>


                  </td>



                  <td>
                    <div class="group-btn">
                      <?= $depto['path_img'] != 'url_empty' ?
                        '<button 
                          id="btnEnableDepto" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#enableModal">
                          <i class="fa-solid fa-image btn-update-icon"></i>
                         </button>' :
                        '<button 
                          id="btnEnableDepto" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#enableModal">
                          <i class="fa-solid fa-ban btn-error-icon"></i>
                         </button>'
                      ?>
                    </div>

                  </td>



                  <td>
                    <div class="group-btn">
                      <?= $depto['status_depto'] == 'off' ?
                        '<button 
                          id="btnEnableDepto" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#enableModal">
                          <i class="fa-solid fa-circle-check btn-enable-icon"></i>
                         </button>'
                        :
                        '<button 
                          id="btnUpdateDepto" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#editModal">
                          <i class="fa-solid fa-pen-to-square btn-update-icon"></i>
                          </button>
                        <button 
                          id="btnDisableDepto" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#disableModal">
                          <i class="fa-solid fa-circle-minus btn-error-icon"></i>
                        </button>
                       '
                      ?>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <div class="box box-form">
          <form id="form_depto">
            <div class="row">
              <div class="col">
                <label for="">Departamento</label>
                <input name="depto_name" id="depto_name" type="text" class="form-control shadow-none" />
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="">Imagen</label>
                <input name="img_file" type="file" class="form-control-file shadow-none" id="img_file_new" accept="image/jpeg, image/jpg, image/png" />
              </div>
            </div>

            <div class="row p-2">
              <div class="col">
                <button id="add_depto" type="submit" class="btn-theme-one"> <i class="fa-solid fa-plus"></i>
                  Crear Nuevo</button>
              </div>
            </div>
          </form>
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

  <!-- Edit department modal-->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualice el nombre</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="body_modal_update" class="body">

        </div>
      </div>
    </div>
  </div>


  <!-- View in web  -->
  <div class="modal fade" id="offWeb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿No visible en web?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="body_modal_offWeb" class="body">

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="onWeb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿No visible en web?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="body_modal_onWeb" class="body">

        </div>
      </div>
    </div>
  </div>



  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>