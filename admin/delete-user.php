<?php
session_start();
include "config.php";
include "function.php";
if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}


if(isset($_GET['id']) && $_GET['id']!==0 )
{

  $id=safe($_GET['id']);
$sql="DELETE FROM user where user_id=$id";
$query=mysqli_query($conn,$sql) or die("Deletion Query Error");
redirect("users.php");


}
 ?>
