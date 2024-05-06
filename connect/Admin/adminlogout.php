<?php
session_start();
session_destroy();

echo "<script>location.href='../Admin/adminlog.php'</script>";
?>