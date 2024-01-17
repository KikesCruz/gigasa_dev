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
            <h1>Categorías</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-box">
        <div class="box">
          <table id="table_categories" class="table table-bordered">
            <?php echo "<pre>";
            print_r($data['categories']);
            echo "</pre>" ?>
            <thead>
              <tr>
                <th>#ID Depto</th>
                <th>Departamentos</th>
                <th>#ID Cat</th>
                <th>Categorías</th>
                <th>Estatus</th>
                <th>Estatus Web</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data['categories'] as $category) : ?>
                <tr id='tb_categories'>
                  <td><?= $category['id_depto'] ?></td>
                  <td class="text-wrap" style="width: 1rem"><?= $category['depto_name'] ?></td>
                  <td><?= $category['id_category'] ?></td>
                  <td><?= $category['category_name'] ?></td>
                  <td><?= $category['status_category'] ?></td>
                  <td>
                    <div class="group-btn">
                      <?= $category['status_category'] == 'off' ?
                        '<button 
                          id="btnEnableCat" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#enableModal">
                          <i class="fa-solid fa-circle-check btn-enable-icon"></i>
                         </button>'
                        :
                        '<button 
                          id="btnUpdateCat" 
                          type="button" 
                          class="btn" 
                          data-toggle="modal" 
                          data-target="#editModal">
                          <i class="fa-solid fa-pen-to-square btn-update-icon"></i>
                          </button>
                        <button 
                          id="btnDisableCat" 
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
          <form id="form_new_category" action="#">
            <div class="row">
              <div class="col">
                <label for="">Categoría</label>
                <input name="name_category" type="text" class="form-control shadow-none" />
              </div>

            </div>
            <div class="row mt-2">
              <div class="col">
                <label for="">Asociar al departamento de:</label>
                <select name="depto" id="depto_list" class="form-control" aria-label="Default select example">
                  <option value="0" selected disable>Departamentos</option>

                  <?php foreach ($data['departments'] as $deptos) : ?>
                    <option value="<?= $deptos['id_depto'] ?>"><?= $deptos['depto_name'] ?></option>
                  <?php endforeach; ?>
                </select>
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