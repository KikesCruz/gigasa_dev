<?php
$js_file = trim($_SERVER['REQUEST_URI'], '/');

echo $js_file;
if($js_file == 'admin'){
    $js_file = 'index';
}else{
    
    $js_file = substr($js_file,6);
}

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="<?= URL_BASE . "Public/Js/Admin/" . $js_file . "/" . $js_file . ".js"; ?>"></script>