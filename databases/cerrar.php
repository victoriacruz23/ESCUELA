<?php
session_start();
session_destroy();

echo "
<script>
    alert('La sesion fue cerrada');
    window.location = '../index.php';
</script>";

?>
