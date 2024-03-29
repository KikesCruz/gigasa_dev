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
                        <h1>Catalogo de Productos</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-box">
                <div class="col-12 ">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Agregar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Masivo</a>
                                </li>

                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">

                                <!-- List Products -->
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <!-- panels start -->
                                    <div class="panels">
                                        <div class="box-container">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h6>Total Productos:</h6>
                                                </div>
                                                <span><?= $data['total_products'] ?></span>
                                            </div>

                                            <div class="box">
                                                <button 
                                                id="btn_list_inactivos" 
                                                type="button" 
                                                class="btn" 
                                                data-toggle="modal" 
                                                data-target="#list_inactivos">
                                                    <div class="box-title">
                                                        <h6>Productos Inactivos:</h6>
                                                    </div>
                                                    <span><?= $data['total_inactivos'] ?></span>
                                                </button>
                                            </div>
                                            <div class="box">
                                                <div class="box-title">
                                                    <h6>Productos en Web:</h6>
                                                </div>
                                                <span>56</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panels end -->
                                    <hr>


                                    <!-- Table start -->
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="tb_catalogo" class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"># SKU</th>
                                                        <th scope="col">Producto</th>
                                                        <th scope="col">Departamento</th>
                                                        <th scope="col">Categoría</th>
                                                        <th scope="col">Sub Categoría</th>
                                                        <th scope="col">Marca</th>

                                                        <th scope="col">Acciones</th>
                                                        <th scope="col">Img</th>
                                                        <th scope="col">Web</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php foreach ($data['products'] as $product) : ?>

                                                        <tr>
                                                            <td><?= $product['sku'] ?></td>
                                                            <td><?= $product['name_product'] ?></td>
                                                            <td><?= $product['depto_name'] ?></td>
                                                            <td><?= $product['category_name'] ?></td>
                                                            <td><?= $product['subcategory_name'] ?></td>
                                                            <td><?= $product['brand_name'] ?></td>
                                                            <td>
                                                                <div class="group-btn">

                                                                    <button id="btnEnableDepto" type="button" class="btn" data-toggle="modal" data-target="#enableModal">
                                                                        <i class="fa-solid fa-gear"></i>
                                                                    </button>

                                                            </td>
                                                            <td>
                                                                <?= $product['imgs'] <= 2 ? '<i class="fa-solid fa-image"></i>' : '' ?>
                                                            </td>
                                                            <td><input type="checkbox" name="" id=""></td>
                                                        </tr>


                                                    <?php endforeach; ?>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Table ends-->
                                </div>

                                <!-- add products -->
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <div class="row">
                                        <div class="col">
                                            <form action="#" class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="">SKU:</label>
                                                        <div class="col-sm-2">
                                                            <input id="input_sku" class="form-control" name="sku" type="text">
                                                            <div class="invalid-feedback">
                                                                Ya esta registrado!
                                                            </div>
                                                        </div>

                                                        <label for="">Nombre articulo:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="" id="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="">Departamento:</label>
                                                        <div class="form-group col-2">
                                                            <select class="form-control" name="" id="departments">
                                                                <option value="0" selected disable>Departamentos</option>
                                                                <?php foreach ($data['departments'] as $department) : ?>
                                                                    <option value="<?= $department['id_depto'] ?>"><?= $department['depto_name'] ?></option>

                                                                <?php endforeach; ?>

                                                            </select>
                                                        </div>

                                                        <label for="">Categoría:</label>
                                                        <div id="list_categories" class="form-group col-2">
                                                            <select class="form-control" name="" id="options_categories">
                                                                <option value="0" selected disable>Categorías</option>
                                                            </select>
                                                        </div>


                                                        <label for="">Sub Categoría:</label>
                                                        <div class="form-group col-2">
                                                            <select class="form-control" name="" id="options_sub_categories">
                                                                <option value="0" selected disable>Sub Categorías</option>
                                                            </select>
                                                        </div>

                                                        <label for="">Marca:</label>
                                                        <div class="form-group col-2">
                                                            <select id="select_brands" class="selectpicker form-control" name="" data-live-search="true">
                                                                <option value="0" selected disable>Marcas</option>

                                                                <?php foreach ($data['brands'] as $brand) : ?>

                                                                    <option value="<?= $brand['id_brand'] ?>"><?= $brand['brand_name'] ?></option>

                                                                <?php endforeach; ?>

                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="">Precio:</label>
                                                        <div class="form-group col-2">
                                                            <input type="text" class="form-control" name="" id="">
                                                        </div>

                                                        <label for="">Peso:</label>
                                                        <div class="form-group col-2">
                                                            <input type="text" class="form-control" name="" id="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="exampleFormControlTextarea1">Descripción</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="<?=IMG_URL.'Icons/Site/no_picture.webp'?>" class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                     
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="<?=IMG_URL.'Icons/Site/no_picture.webp'?>"class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="<?=IMG_URL.'Icons/Site/no_picture.webp'?>"class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="<?=IMG_URL.'Icons/Site/no_picture.webp'?>"class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card" style="width: 18rem;">
                                                                <img src="<?=IMG_URL.'Icons/Site/no_picture.webp'?>"class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlFile1">Example file input</label>
                                                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <button type="submit" class="btn-theme-one">Cargar Articuló</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- add products ends  -->

                                <!-- add masivo -->
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Para poder cargar el inventario masivo, descargue la plantilla en formato xlsx.</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Descargue aquí la plantilla</span>
                                            <a href="#">
                                                <img src="./img/no_picture.png" alt="">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <span>Cargue aquí la plantilla con los datos </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.content-wrapper -->


    <!-- Modal List Inactivos-->
<div class="modal fade" id="list_inactivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div  class="modal-body">
        <table id="tb_inactivos" class="table">
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>SKU:</th>
                    <th>Producto</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="box_inactivos">
               
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




    <?php
    require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php';
    ?>