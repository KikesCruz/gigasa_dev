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

          <table class='table table-striped  table-condensed' style='width:100%'>

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
                <tr id='tr_subcategories'>
                  <td><?= $sub_category['id_sub_category'] ?></td>
                  <td class="text-wrap" style="width: 1rem"><?= $sub_category['name_sub_category'] ?></td>
                  <td><?= $sub_category['id_category'] ?></td>
                  <td><?= $sub_category['name_category'] ?></td>
                  <td>
                    <button id="btn_status" type="button" class="btn-status <?= $sub_category['status_subcategory'] == 'activado' ? 'success' : 'error' ?>" data-status="<?= $sub_category['status_subcategory'] ?>" data-toggle="modal" data-target="#modal_status">
                      <?= $sub_category['status_subcategory'] ?>
                    </button>
                  </td>
                  <td>
                    <button 
                    id="btn_edit" 
                    data-toggle="modal" 
                    data-target="#modal_edit"
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
          <form id="form_sub_category" autocomplete="off">

            <div class="row">
              <div class="col">
                <label for="">Sub Categoría</label>
                <input name="name_subcategory" type="text" class="form-control shadow-none" />
              </div>

            </div>
            <div class="row mt-2">
              <div id="categories" class="col">
                <label for="">Asociar a la categoría:</label>
                <select name="category" id="depto_list" class="form-control" aria-label="Default select example">

                  <option value="0" selected disable>Categorías</option>
                  <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?= $category['id_category'] ?>"><?= $category['name_category'] ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <div class="row p-2">
              <div class="col">
                <button id="btn_add_subcategory" type="button" class="btn-theme-one">
                  <i class="fa-solid fa-plus"></i>
                  Crear Sub Categoría
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

  <!-- modal status change sub category -->
  <div class="modal fade" id="modal_status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div id="content-status" class="modal-content">
      </div>
    </div>
  </div>



  <!-- Edit department modal-->
  <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar sub categoría</h5>
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