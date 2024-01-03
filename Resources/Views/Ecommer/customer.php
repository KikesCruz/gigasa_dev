<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/header.php'; ?>

<section class="account_forms">
    <div class="box-container">
        <div id="form_login" class="box form-login">
            <div class="title">
                <h5>Iniciar Sesion</h5>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form_container">
                <form action="#">
                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="Correo">
                            <label for class="label">Correo</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="password" class="input" placeholder="Correo">
                            <label for class="label">Contraseña</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button class="btn_theme_one">Acceder</button>
                    </div>
                </form>
                <div class="dropdown-divider"></div>
                <a href>¿Olvidaste tu contraseña?</a>
            </div>
        </div>

        <div id="box_btn-new-account" class="box box-for-register">
            <div class="title">
                <h5>Crear cuenta</h5>
            </div>
            <div class="dropdown-divider"></div>

            <button id="btn_new-account" class="btn_theme_one">
                No tengo cuenta
            </button>
        </div>

        <div id="form_new-account" class="box hidden_form-logout">
            <div class="title">
                <h5>Crear cuenta</h5>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form_container">
                <form action="#">
                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="Correo">
                            <label for class="label">Nombre:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="Correo">
                            <label for class="label">Apellido Paterno:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="Correo">
                            <label for class="label">Apellido Materno:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="Correo">
                            <label for class="label">Telefono:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="email" class="input" placeholder="Correo">
                            <label for class="label">Correo:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="password" class="input" placeholder="Correo">
                            <label for class="label">Contraseña:*</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="inputContainer">
                            <input type="password" class="input" placeholder="Correo">
                            <label for class="label">Confirma tu Contraseña:*</label>
                        </div>
                    </div>


                    <div class="dropdown-divider"></div>

                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" required />
                        <label class="form-check-label" for="flexCheckDefault">
                            Acepto recibir promociones
                        </label>
                    </div>

                    <div class="mb-3">
                        <input class="form-check-input" type="checkbox" required />
                        <label class="form-check-label" for="flexCheckDefault">
                            Acepto <a href="#">Terminos y Condiciones</a>
                        </label>
                    </div>

                    <div class="mb-3">
                        <button class="btn_theme_one">Crear Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/footer.php'; ?>