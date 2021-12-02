<?php session_start();
include "config.php";
include "function.php";
include "../constant.inc.php";
if(!(isset($_SESSION['username']) ))
{
  redirect('index');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title class="titletxt"></title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $csslink ?>/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="<?php echo $csslink ?>/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="<?php echo $csslink ?>/style.css">
    </head>
    <body class='set'>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->

                <div class="row ">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post"><img class="logo" src="<?php echo $load ?>/admin/images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-8  col-md-1">
                      <span class="name-x firstset"><?php echo $_SESSION['username'] ?></span>
                        <a href="logout" class="admin-logout"> logout</a>
                    </div>
                    <!--<div class="col-md-offset-9  col-md-1">
                      <span class="name-x"><?php echo $_SESSION['username'] ?></span>
                        <a href="logout" class="admin-logout"> logout</a>
                    </div>-->
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">

                            <?php
                            if($_SESSION['role']==1)
                            {
                              $array_cat=["post","category","users","setting"];
                              foreach($array_cat as $key=>$value)
                              {
                              echo "<li ><a id='$value' class='tab_active' href='$load/admin/$value'>$value</a></li>";
                            }
                            }
                            else{
                              $array_cat=["post","users"];
                              foreach($array_cat as $key=>$value){
                              echo "<li><a id='$value' class='tab_active' href='$load/admin/$value'>$value</a></li>";
                              }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
