<?php
    include(__DIR__ . "/../layout/default.php");
?>


Hello <?php if (isset($data['name'])) {echo $data['name'];}?>