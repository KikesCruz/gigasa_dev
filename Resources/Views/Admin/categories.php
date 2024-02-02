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
            <h1>Categorias</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-box">

        <div class="box">
          <table id="tb_categories" class="table table-striped  table-condensed" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Categorias</th>
                <th>Estatus</th>
                <th>Web</th>
                <th>Img</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($data as $categories) : ?>
                <tr id="tr_category">
                  <td><?= $categories['id_category'] ?></td>
                  <td><?= $categories['name_category'] ?></td>
                  <td>
                
                  
                  <?= $categories['status'] == 'activado' ? 
                  '<button
                  id="" 
                  type="button" 
                  data-toggle="modal" 
                  data-target="#off_category_modal"
                  class="btn-status success">
                  activado
                  </button>'
                  : 
                  '<button class="btn-status error">
                  desactivado
                  </button>'
                  ?>

                  </td>
                  <td>

                    <?php if ($categories['img_path'] != 'url_empty') : ?>
                    
                       <button 
                       id="btn_update_web" 
                       type="button" 
                       class="btn-icons-web <?=$categories['view_web']=='on'?'off':'on'?>" 
                       data-toggle="modal" 
                       data-target="#modal_web"
                       data-web="<?=$categories['view_web']?>">
                       <?=$categories['view_web'] == 'on' ? '<i class="fa-solid fa-store-slash"></i>':' <i class="fa-solid fa-store"></i>'?>
                       </button>
                    
                    
                    <?php endif; ?>


                  </td>



                  <td>
                
                      <?= $categories['img_path'] == 'url_empty' ?
                          '<button
                          id="btnEnableDepto" 
                          type="button"
                          class="btn-icons-img error" 
                          data-toggle="modal" 
                          data-target="#enableModal">
                          <i class="fa-solid fa-ban"></i>
                         </button>'
                         :
                         '<button 
                         id="btnEnableDepto" 
                         type="button" 
                         class="btn-icons-img img" 
                         data-toggle="modal" 
                         data-target="#">
                         <i class="fa-solid fa-image"></i>
                        </button>'
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
          <form id="form_depto">
            <div class="row">
              <div class="col">
                <label for="">Categoría</label>
                <input name="category_name" id="depto_name" type="text" class="form-control shadow-none" autocomplete="false" />
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="">Imagen <span>*solo formato svg</span></label>
              <div class="row">
                <div class="col">
                  <div class="form-group input-file">
                    <input name="img_category" type="file" class="form-control-file files" id="img_file_new" accept="image/svg+xml"  />
                  </div>
                </div>
              </div>
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

  <div class="modal fade" id="off_category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  <div class="modal fade" id="modal_web" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div id="modal-content-web" class="modal-content">
        
      </div>
    </div>
  </div>


  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>