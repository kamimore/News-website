<?php session_start();

include "config.php";
include "function.php";
include "../constant.inc.php";
if((isset($_SESSION['username']) ))
{
  redirect('users');
}
$msg="";


if(isset($_POST['login']))
{
  $username=safe($_POST['username']);
  $password=safe($_POST['password']);
  $passwordmd=md5($password);
   $query="Select user_id , username , role from user where username='$username' and password='$passwordmd'";

  $sql=mysqli_query($conn,$query);
  if(mysqli_num_rows($sql)>0)
  {
    $sql=mysqli_fetch_assoc($sql);
    $_SESSION['user_id']=$sql['user_id'];
    $_SESSION['username']=$sql['username'];
    $_SESSION['role']=$sql['role'];
    redirect('users');

  }
  else{
     $msg="<div class='alert alert-danger '>Invalid Input</div>";
  }

}

 ?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="<?php echo $csslink ?>/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $csslink ?>/font-awesome.css">
        <link rel="stylesheet" href="<?php echo $csslink ?>/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                                <?php echo $msg; ?>
                            </div>

                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
