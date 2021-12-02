<?php
session_start();
include 'config.php';
include "function.php";
if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}

//echo "checking";
if(isset($_GET['id']) and isset($_GET['cat_id']))
{
  $post_id=safe($_GET['id']);
  $cat_id=safe($_GET['cat_id']);
  $sql1="SELECT * FROM post where post_id = {$post_id};";
  $result=mysqli_query($conn,$sql1) or die("Query Failed : Select");
  $row=mysqli_fetch_assoc($result);
  if(file_exists("upload/".$row['post_img']))
  {
    //echo 'hello';
    unlink("upload/".$row['post_img']);

  }
  $sql="DELETE FROM post where post_id = {$post_id};";
  $sql.= " UPDATE category SET post=post-1 where category_id={$cat_id}";

  if(mysqli_multi_query($conn,$sql)){
  redirect('post');
  }
  else{
    echo "Query failed";
  }
}else{
  redirect('post');
}
 ?>
