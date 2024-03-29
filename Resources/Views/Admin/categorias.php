<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>
<div class='wrapper'>
  <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/navbar.php';
  ?>
  <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class='content-wrapper'>
    <div class='content-header'>
      <div class='container-fluid'>
        <div class='row mb-2'>
          <div class='col-12 text-center mt-2'>
            <h1>Categorías</h1>
          </div>
        </div>
      </div>
    </div>

    <section class='content'>
      <div class='container-box'>

        <div class='box'>
          <table id='tb_categories' class='table table-striped  table-condensed' style='width:100%'>
            <thead>
              <tr>
                <th>#</th>
                <th>Categorías</th>
                <th>Estatus</th>
                <th>Web</th>
                <th>Img</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data as $categories) : ?>
                <tr id='tr_category'>
                  <td>
                    <?= $categories['id_category'] ?>
                  </td>
                  <td>
                    <?= $categories['name_category'] ?>
                  </td>
                  <td>

                    <button id='btn_update_status' type='button' class="btn-status <?= $categories['status'] == 'activado' ? 'success' : 'error' ?>" data-status='<?= $categories['status'] ?>' data-toggle='modal' data-target='#modal_status'>
                      <?= $categories['status'] ?>

                    </button>

                  </td>
                  <td>

                    <?php if ($categories['img_path'] != 'url_empty' && $categories['status'] != 'desactivado') : ?>

                      <button id='btn_update_web' type='button' class="btn-icons-web <?= $categories['view_web'] == 'on' ? 'off' : 'on' ?>" data-toggle='modal' data-target='#modal_web' data-web="<?= $categories['view_web'] ?>">
                        <?= $categories['view_web'] == 'on' ? '<i class="fa-solid fa-store-slash"></i>' : ' <i class="fa-solid fa-store"></i>' ?>
                      </button>

                    <?php endif;
                    ?>

                  </td>

                  <td>

                    <button id='btn_img_category' type='button' class="btn-icons-img <?= $categories['img_path'] == 'url_empty' ? 'error' : 'img' ?>" data-toggle='modal' data-target='#modal_img_category'>

                      <?= $categories['img_path'] == 'url_empty' ? '<i class="fa-solid fa-ban"></i>' : '<i class="fa-solid fa-image"></i>' ?>

                    </button>

                  </td>

                  <td>
      
                    <button 
                      id='btn_edit_category'
                      type='button' 
                      class="btn-icons-img" 
                      data-toggle='modal' 
                      data-target='#modal_edit_category'>
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach;?>

            </tbody>
          </table>
        </div>

        <div class='box box-form'>
          <form id='form_category'>
            <div class='row'>
              <div class='col'>
                <label for=''>Categoría</label>
                <input name='category_name' type='text' class='form-control shadow-none' autocomplete='false' />
              </div>
            </div>

            <div class='row'>
              <div class='col'>
                <label for=''>Imagen <span>*solo formato svg</span></label>
                <div class='row'>
                  <div class='col'>
                    <div class='form-group input-file'>
                      <input name='img_category' type='file' class='form-control-file files' id='img_file_new' accept='image/svg+xml' />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class='row p-2'>
              <div class='col'>
                <button id='new_category' type='button' class='btn-theme-one'> <i class='fa-solid fa-plus'></i>
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

  <!-- edit category modal-->
  <div class='modal fade' id='modal_edit_category' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='exampleModalLabel'>Actualice el nombre</h5>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
            <span aria-hidden='true'>&times;
            </span>
          </button>
        </div>
        <div id='body_modal_update' class='body'>

        </div>
      </div>
    </div>
  </div>

  <!-- View in web  -->
  <div class='modal fade' id='modal_web' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div id='modal-content-web' class='modal-content'>

      </div>
    </div>
  </div>

  <div class='modal fade' id='modal_img_category' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog '>
      <div id='modal-content-img' class='modal-content'>

      </div>
    </div>
  </div>

  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>