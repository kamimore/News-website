<?php session_start();
include 'config.php';
include "function.php";
//pxr($_POST);
if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}

if(empty($_FILES['new-image']['name'])){
  $file_name=safe($_POST['old-image']);
}
else
{
  $errors=array();
  $file_name=$_FILES['new-image']['name'];
  $file_size=$_FILES['new-image']['size'];
  $file_tmp=$_FILES['new-image']['tmp_name'];
  $file_type=$_FILES['new-image']['type'];
  $file_ext=explode('.',$file_name);

  $file_ext=strtolower(end($file_ext));

  $extensions= array('jpeg','jpg','png','webp');
  if(in_array($file_ext,$extensions)===false)
  {
    $errors[]="This extension file not  allowed,Please choose a JPG or PNG format";
  }
  if($file_size > 2097152){   //1mb=1024kb and 1kb=1024bytes
    $errors[]="File size must be 2mb or lower";

  }
  if(empty($errors)==true){
    $file_name=strtotime("now")."-".$file_name;
    move_uploaded_file($file_tmp,"upload/".$file_name);

  }
  else{
    print_r($errors);
    die();
  }

}
if(isset($_POST['submit'])){

  $sql="UPDATE category SET post=post-1 where category_id={$_POST["old_cat"]};";
  $sql.=" UPDATE post SET title='{$_POST["post_title"]}'
  ,description='{$_POST["postdesc"]}',category={$_POST["category"]},post_img='{$file_name}' WHERE post_id={$_POST["post_id"]};";
 $sql.=" UPDATE category SET post=post+1 where category_id={$_POST["category"]};";


$result=mysqli_multi_query($conn,$sql);


if($result){
  redirect('post');
}
else{
  echo "Query failed";
}
}

 ?>
