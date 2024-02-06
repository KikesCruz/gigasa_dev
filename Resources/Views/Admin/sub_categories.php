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
            <h1>Sub Categorías</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-box">
        <div class="box">

          <table  class='table table-striped  table-condensed' style='width:100%' >
            
            <thead>
              <tr>
                <th>#ID Sub Cat</th>
                <th>Sub Categorías</th>
                <th>#ID Categoría</th>
                <th>Categoría</th>
                <th>Estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data['sub_categories'] as $sub_category) : ?>
                <tr id='tb_categories'>
                  <td><?= $sub_category['id_sub_category'] ?></td>
                  <td class="text-wrap" style="width: 1rem"><?= $sub_category['name_sub_category'] ?></td>
                  <td><?= $sub_category['id_category'] ?></td>
                  <td><?= $sub_category['name_category'] ?></td>
                  <td>
                    <button
                        id=""
                        type="button"
                        class="btn-status <?= $sub_category['status'] == 'activado' ? 'success' : 'error' ?>"
                        data-toggle=""
                        data-target="#">
                      <?= $sub_category['status'] ?>
                    </button>
                  </td>
                  <td>
                    <button
                    class="btn"
                    >
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
        <div class="box box-form">
          <form id="form_new_category">
            <div class="row">
              <div class="col">
                <label for="">Sub Categoría</label>
                <input name="name_category" type="text" class="form-control shadow-none"/>
              </div>

            </div>
            <div class="row mt-2">
              <div class="col">
                <label for="">Asociar a la categoría:</label>
                <select name="depto" id="depto_list" class="form-control" aria-label="Default select example">
                  <option value="0" selected disable>Categorías</option>

                  <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          
            <div class="row p-2">
              <div class="col">
                <button id="btn_add_new" type="button" class="btn-theme-one">
                  <i class="fa-solid fa-plus"></i>
                  Crear Nuevo
                </button>
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
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro desea activar la categoría?</h5>
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
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro desea desactivar la categoría?</h5>
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
          <h5 class="modal-title" id="exampleModalLabel">Actualizar categoría</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="body_modal_update" class="body">

        </div>
      </div>
    </div>
  </div>



  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>