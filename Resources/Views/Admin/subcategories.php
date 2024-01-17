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
    <?php var_dump($data['subcategories']) ?>
    <section class="content">
      <div class="container-box">
        <div class="box">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#ID Subcategory</th>
                <th>Subcategoría</th>
                <th>#ID Cat</th>
                <th>Categorías</th>
                <th>Estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data['subcategories'] as $subs): ?>
                <tr id="td_categories">
                  <td>
                    <?= $subs['id_subcategory'] ?>
                  </td>
                  <td>
                    <?= $subs['subcategory_name'] ?>
                  </td>
                  <td>
                    <?= $subs['status_subcategory'] ?>
                  </td>
                  <td>
                    <?= $subs['id_category'] ?>
                  </td>
                  <td>
                    <?= $subs['category_name'] ?>
                  </td>
                  <td>
                    <?= $subs['status_category'] ?>
                  </td>
                  <td>
                    <div class="group-btn">
                      <?= $subs['status_category'] == 'off' ?
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
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

        <div class="box bow-form">
        <form id="form_new_subcategory" action="#">

            <!---CATEGORY--->
            <div class="row mt-2">
              <div class="col">
                <label for="">Asociar al departamento de:</label>
                <select name="depto" id="depto_list" class="form-control" aria-label="Default select example">
                  <option value="0" selected disable>Departamentos</option>

                  <?php foreach ($data['departments'] as $deptos): ?>
                  <option value="<?= $deptos['id_depto'] ?>">
                      <?= $deptos['depto_name']?>
                  </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!--NEW SUBCAT -->
            <div class="row mt-2">
              <div class="col">
                <label for="">Asociar al la categoría de:</label>
                <select name="id_category" id="category_list" class="form-control"
                  aria-label="Default select example">
                  <option value="0" selected disable>Categoría</option>
                  <?php foreach ($data['categories'] as $deptos): ?>
                    <option value="<?= $deptos['id_category'] ?>">
                      <?= $deptos['category_name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!---DEPARTAMENT--->
            <div class="row">
              <div class="col">
                <label for="">Sub Categoría</label>
                <input name="name_subcategory" type="text" class="form-control shadow-none" />
              </div>
            </div>
            <div class="row p-2">
              <div class="col">
                <button id="btn_add_new" type="button" class="mt-2 btn-theme-one w-100">
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
  <?php
  require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
  ?>