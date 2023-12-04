<?php
$js_file = trim($_SERVER['REQUEST_URI'], '/');
$js_file = $js_file ? $js_file :'index';
?>

<script src = "<?= URL_BASE . "Public/Js/".$js_file."/".$js_file.".js"; ?>"></script>