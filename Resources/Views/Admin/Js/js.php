<?php
$js_file = trim($_SERVER['REQUEST_URI'], '/');


if ($js_file == 'admin') {
    $js_file = 'index';
} else {

    $js_file = substr($js_file, 6);
}

?>

<!-- jQuery -->
<script src="<?= URL_BASE . 'Public/Adminlte/plugins/jquery/jquery.min.js' ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= URL_BASE . 'Public/Adminlte/plugins/boostrap/bootstrap.bundle.min.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?= URL_BASE . 'Public/Adminlte/dist/js/adminlte.min.js' ?>"></script>
<script src="<?= URL_BASE . 'Public/Adminlte/plugins/toastr/toastr.min.js' ?>"></script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
<!-- Genera el archivo JS por view -->
<script src="<?= URL_BASE . "Public/Js/Admin/" . $js_file . "/" . $js_file . ".js"; ?>"></script>