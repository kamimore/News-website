<?php session_start();

include "config.php";
include "../constant.inc.php";
include "function.php";

mysqli_close($conn);
session_unset();
session_destroy();
redirect('index');

 ?>
