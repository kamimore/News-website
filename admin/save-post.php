<?php
session_start();
include "config.php";
include "function.php";
//pxr($_FILES);
//pxr($_POST);


if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}

if(isset($_FILES['fileToUpload'])){
  $errors=array();
  $file_name=$_FILES['fileToUpload']['name'];
  $file_size=$_FILES['fileToUpload']['size'];
  $file_tmp=$_FILES['fileToUpload']['tmp_name'];
  $file_type=$_FILES['fileToUpload']['type'];
  $file_ext=explode('.',$file_name);
  $file_ext=strtolower(end($file_ext));
  $extensions= array('jpeg','jpg','png','webp');
  if(in_array($file_ext,$extensions)===false)
  {
    $errors[]="This extension image file not  allowed,Please choose a JPG or PNG format";
  }
  if($file_size > 2097152){   //1mb=1024kb and 1kb=1024bytes
    $errors[]="File size must be 2mb or lower";

  }
  if(empty($errors)==true){
    $file_name=strtotime("now")."-".$file_name;
    move_uploaded_file($file_tmp,"upload/".$file_name);

  }
  else{
    pxr($errors);


  }
}

//session_start();
if(isset($_POST['submit']))
{
  $title=safe($_POST['post_title']);
  $description=safe($_POST['postdesc']);
  $category=safe($_POST['category']);
  $date=date("d M,Y");
  $author=$_SESSION['user_id'];

  $sql="INSERT INTO post(title,description,category,post_date,author,post_img)
    VALUES('{$title}','{$description}',{$category},'{$date}',{$author},'{$file_name}');";

    $sql.="UPDATE category SET post=post + 1 WHERE category_id={$category}";

    if(mysqli_multi_query($conn,$sql)){
      redirect('post');
    }
    else{
      echo "<div class='alert alert-danger'>Query failed</div>";
    }
}


 ?>
