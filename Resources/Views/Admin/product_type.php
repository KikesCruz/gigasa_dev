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
                <th>#Id</th>
                <th>Tipo articulo</th>
                <th>Sub Categorías</th>
                <th>Categoría</th>
                <th>Estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach( $data['productsType'] as $item) : ?>
                <tr id="tr_type_product">
                  <td><?= $item['id_type_product'] ?></td>
                  <td><?= $item['name_type'] ?></td>
                  <td><?= $item['name_sub_category'] ?></td>
                  <td><?= $item['name_category'] ?></td>
                  <td>

                    <button
                    id="btn_status" 
                    type="button" 
                    class="btn-status <?=$item['status'] == 'activado' ? 'success' : 'error'?>" 
                    data-status="<?= $item['status'] ?>" data-toggle="modal" data-target="#modal_status">
                    <?= $item['status'] ?>
                    </button>

                  </td>
                </tr>
                <?php endforeach; ?>

                
            </tbody>
          </table>
        </div>

        <div class="box box-form">
          <form id="form_type_product" autocomplete="off">
            
            <div class="row">
              <div class="col">
                <label for="">Tipo de articulo</label>
                <input name="item_type_name" type="text" class="form-control shadow-none" />
              </div>
            </div>


            <div class="row">
              <div class="col">
                <label for="sub_categories">Categorías</label>
                <select id="categories" name="id_category"  class="form-control">
                <option value="0" selected disable>Categorías</option>

                <?php foreach( $data['categories'] as $subcategory) : ?>
                <option value="<?=$subcategory['id_category']?>"><?=$subcategory['name_category']?></option>
                <?php endforeach; ?>

                </select>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <label for="sub_categories">Sub Categorías</label>
                <select id="sub_categories" name="id_subcategory"  class="form-control">
                <option value="0" selected disable>Sub Categorías</option>

                </select>
              </div>
            </div>

        

            <div class="row p-2">
              <div class="col">
                <button id="btn_new_type" type="button" class="btn-theme-one">
                  <i class="fa-solid fa-plus"></i>
                  Crear Tipo de articulo
                </button>
              </div>
            </div>

          </form>

        </div>

      </div>
    </section>
  </div>


  <!-- modal section -->

  <!-- modal change status -->
  <div class="modal fade" id="modal_status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div id="content-status" class="modal-content">
      </div>
    </div>
  </div>






  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>