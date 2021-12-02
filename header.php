<?php
include "admin/config.php";
include "admin/function.php";
include "constant.inc.php";
$title="";


$txt=str_replace(".php","",basename($_SERVER['PHP_SELF']));
switch ($txt) {
case 'index':
$title="Welcome to News-site";
break;
case 'author':
if(isset($_GET['aid']))
{
  $aid=safe($_GET['aid']);
  $sql="select user.first_name ,user.last_name
  from post left join user on post.author=user.user_id
  where post.author='$aid' ";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  $title="Post By ".$row['first_name']." ".$row['last_name'];

}
else{
  $title="NO RESULT";
}
break;
case 'category':
if(isset($_GET['cid']))
{
  $cid=safe($_GET['cid']);
  $sql="select category.category_name
  from post left join category on post.category=category.category_id
  where post.category='$cid'  ";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  $title=$row['category_name'].' '.'NEWS';

}else{
  $title="NO RESULT";
}
break;
case 'single':
if(isset($_GET['id']))
{
  $id=safe($_GET['id']);
  $sql="select title
  from post where post_id='$id' ";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
  $title=strtoupper($row['title']);
}
else{
  $title="NO RESULT";
}
break;
case 'search':
if(isset($_GET['search']))
{
  $search=safe($_GET['search']);
  $title="Search By ".$search;
}
else{
  $title="NO RESULT";
}
break;
default:
$title="News-site";
break;
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title class="titletxt"><?php echo $title ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $csslink ?>/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo $csslink ?>/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="<?php echo $csslink ?>/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
              <?php
                 $rownew=mysqli_fetch_assoc(mysqli_query($conn,"select * from setting"));
                 $logo=$rownew['logo'];
              ?>
                <a href="<?php echo $load ?>/vayuananda" id="logo"><img src="<?php echo $load ?>/admin/images/<?php echo $logo ?>"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                  <?php if(isset($_GET['cid']) and $_GET['cid']!="" and $_GET['cid']!=0)
                  {
                    $cate_id=safe($_GET['cid']);
                  }
                  else{
                     $txttxt=str_replace(".php","",basename($_SERVER['PHP_SELF']));
                     $cate_id=$txttxt=='index'?"active":'';
                  }
                   ?>
                  <li><a class='<?php echo $cate_id; ?>' href='<?php echo $load ?>/vayuananda'>Home</a></li>
                  <?php
                  $sql1="select * from category where post>0";
                  $query1=mysqli_query($conn,$sql1);

                  if(mysqli_num_rows($query1) > 0){

                    while($row1=mysqli_fetch_assoc($query1))
                    {
                    $active=$row1['category_id']==$cate_id?'active':' ';
                      echo "<li ><a class='{$active}' href='{$load}/category/{$row1['category_id']}'>{$row1['category_name']}</a></li>";

                    }
                  }
                   ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
