<?php
require PATH_ROOT . 'Resources/Views/Admin/Shared/header.php';
?>


<body>
    <main>
        <div class='contianer d-flex'>
            <div class='col-12 p-2 d-flex align-items-center justify-content-center'>
                <div>
                    <div class='form-detail p-3'>
                        <img width='320px' height='320px' src='<?= URL_BASE . '\Public\Img\icons\icon-vertical.png'; ?> ' alt=''>
                    </div>

                    <div class='form-input p-3'>
                        <form action='./admin/auth' method='POST'>
                            <!-- Email input -->
                            <div class='form-outline mb-4'>
                                <input name='email' type='text' id='form1Example1' class='form-control' />
                            </div>

                            <!-- Password input -->
                            <div class='form-outline mb-4'>
                                <input name='pass' type='password' id='form1Example2' class='form-control' />
                            </div>

                            <!-- Submit button -->
                            <button type='submit' class='btn btn-success col-12'>
                                Inicia Sesión
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <?php require PATH_ROOT . 'Resources/Views/Admin/Shared/footer.php'; ?>