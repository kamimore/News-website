<?php
session_start();
include 'config.php';
include "function.php";
if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}

$cat_id=safe($_GET['id']);
$sql="DELETE FROM category where category_id = {$cat_id};";
$sql.=" DELETE FROM post where category= {$cat_id}";

if(mysqli_multi_query($conn,$sql))
{
redirect('category');
}
else{
  echo "Query failed";
}
 ?>
