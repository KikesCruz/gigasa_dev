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
            <h1>Marcas</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-box">

        <div class="box">
          <table id="tble_marcas" class='table table-striped  table-condensed' style='width:100%'>
            <thead>
              <tr>
                <th>#ID Marca</th>
                <th>Marcas</th>
                <th>Estatus</th>
                <th>Logo</th>
                <th>Store</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data as $brand) : ?>
                <tr id="tb_marcas">
                  <td><?= $brand['id_brand'] ?></td>
                  <td><?= $brand['name_brand'] ?></td>
                  <td>
                    <button 
                    id="btn_status" 
                    type="button" 
                    class="btn-status <?= $brand['status_brand'] == 'activado' ? 'success' : 'error' ?>" 
                    data-status="<?= $brand['status_brand'] ?>" 
                    data-toggle="modal" 
                    data-target="#modal_status">
                    <?= $brand['status_brand'] ?>
                    </button>

                  </td>
                  <td>
                    <button 
                    id='btn_img_category' 
                    type='button' 
                    class="btn-icons-img <?= $brand['img_path'] == 'url_empty' ? 'error' : 'img' ?>" 
                    data-toggle='modal' 
                    data-target='#modal_img_category'>
                      <?= $brand['img_path'] == 'url_empty' ? '<i class="fa-solid fa-ban"></i>' : '<i class="fa-solid fa-image"></i>' ?>
                    </button>
                  </td>
                  <td>
                    <?php if ($brand['img_path'] != 'url_empty' && $brand['status_brand'] != 'desactivado') : ?>
                      <button id='btn_update_web' type='button' class="btn-icons-web <?= $brand['view_web'] == 'on' ? 'off' : 'on' ?>" data-toggle='modal' data-target='#modal_web' data-web="<?= $brand['view_web'] ?>">
                        <?= $brand['view_web'] == 'on' ? '<i class="fa-solid fa-store-slash"></i>' : ' <i class="fa-solid fa-store"></i>' ?>
                      </button>
                    <?php endif;
                    ?>
                  </td>
                  <td>
                  </td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <div class="box box-form">
          <form id="form_brand">
            <div class="row">
              <div class="col">
                <label for="">Marca</label>
                <input name="brand_name" type="text" class="form-control shadow-none" />
              </div>

            </div>

            <div class="row">
              <div class="col">
                <label for="">Imagen</label>
                <div class="row">
                  <div class="col">
                    <div class="form-group input-file">
                      <input name="img_brand" type="file" class="form-control-file files" id="img_file_new" accept="image/jpeg, image/jpg, image/png, image/webp" />
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row p-2">
              <div class="col">
                <button id="add_brand" type="button" class="btn-theme-one"> <i class="fa-solid fa-plus"></i>
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

  <!-- modal estatus -->
  <div class='modal fade' id='modal_status' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div id='modal-content-status' class='modal-content'>

      </div>
    </div>
  </div>

  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>