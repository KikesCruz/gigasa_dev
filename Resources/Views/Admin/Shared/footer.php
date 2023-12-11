<?php
$js_file = trim($_SERVER['REQUEST_URI'], '/');

$js_file = 'admin' ? 'index': $js_file;
?>

<script src = "<?= URL_BASE . "Public/Js/Admin/".$js_file."/".$js_file.".js"; ?>"></script>