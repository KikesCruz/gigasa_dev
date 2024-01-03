<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/header.php'; ?>


<section class="my-profile">
    <div class="box-container">
        <div class="header-profile">
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pill-tab-0" data-bs-toggle="pill" href="#pill-tabpanel-0" role="tab" aria-controls="pill-tabpanel-0" aria-selected="true">Mi Cuenta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pill-tab-2" data-bs-toggle="pill" href="#pill-tabpanel-1" role="tab" aria-controls="pill-tabpanel-1" aria-selected="false">Domicilio para entrega</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pill-tab-2" data-bs-toggle="pill" href="#pill-tabpanel-2" role="tab" aria-controls="pill-tabpanel-2" aria-selected="false">Mis Compras</a>
                </li>
            </ul>
        </div>
        <hr />
        <div class="tab-content body-profile mt-2">
            <div class="tab-pane active" id="pill-tabpanel-0" role="tabpanel" aria-labelledby="pill-tab-0">
                <form>
                    <h4 class="pt-2 pb-4">Mis Datos:</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="email" class="input form-control" placeholder="a" value="email@example.com" readonly>
                                <label for class="label">Correo:</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="+52 55 4512-4582">
                                <label for class="label">Telefono:</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="password" class="input" value="email@example.com">
                                <label for class="label">Contraseña:</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="password" class="input" value="email@example.com">
                                <label for class="label">Confirmar Contraseña:</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn_theme_one">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane" id="pill-tabpanel-1" role="tabpanel" aria-labelledby="pill-tab-1">
                <form>
                    <h4 class="pt-2 pb-4">Datos Personales:</h4>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Nombre</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Apellidos</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="email" class="input form-control" placeholder="a" value="email@example.com" readonly>
                                <label for class="label">Correo:</label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="+52 55 4512-4582">
                                <label for class="label">Telefono:</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="pt-2 pb-4">Datos de entrega:</h4>
                    <div class="row">

                        <div class="col-lg-8 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Calle</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <div class="inputContainer">
                                <input type="text" class="input" value="52B">
                                <label for class="label">No. Ext</label>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" value="52910">
                                <label for class="label">C.P</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Colonia</label>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" value="52B">
                                <label for class="label">Municipio</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="inputContainer">
                                <input type="text" class="input" placeholder="a" value="My nombre">
                                <label for class="label">Referencias:</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn_theme_one">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="pill-tabpanel-2" role="tabpanel" aria-labelledby="pill-tab-2">
                Tab 3 content
            </div>
        </div>
    </div>
</section>


<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/footer.php'; ?>