<?php
    include("../layout/default.php");
?>

Hello <?php if (isset($data['name'])) {echo $data['name'];}?>