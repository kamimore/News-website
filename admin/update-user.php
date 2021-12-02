<?php include "header.php";
//include "config.php";
//include "function.php";

$msg="";

if(isset($_GET['id']) && $_GET['id']!==0 )
{
  $id=safe($_GET['id']);
}
else{
  redirect('users');
}

$rowforchecking=mysqli_fetch_assoc(mysqli_query($conn,"select user_id from user where user_id='$id'"));
if(($rowforchecking['user_id']==$_SESSION['user_id']) or $_SESSION['role']==1)
{
  $sql="SELECT * FROM user where user_id=$id";
  $query=mysqli_query($conn,$sql) or die("Query Error");
  $run=mysqli_fetch_assoc($query);

}
else
{
  redirect('users');
}

if(isset($_POST['submit'])){
  $user_id=safe($_POST['user_id']);
  $first_name=safe($_POST['f_name']);
  $last_name=safe($_POST['l_name']);
  $username=safe($_POST['username']);
  $role=safe($_POST['role']);
  $sql2="SELECT username from user where username='$username' and user_id!=$user_id";
  $run=mysqli_query($conn,$sql2) or die("Query Failed");
  if(mysqli_num_rows($run) > 0)
  {
    $msg="This Username Already Exist";
  }
  else{
  $sqll="UPDATE user set first_name='$first_name',last_name='$last_name',username='$username',role='$role' where user_id=$user_id";
  $run=mysqli_query($conn,$sqll) or die("Update Query Failed");
  redirect("users");

  }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <?php

                   ?>
                  <form  method="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $run['user_id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $run['first_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $run['last_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $run['username'] ?>" placeholder="" required>
                          <p class=" bg-danger text-danger mt-3"><?php echo $msg; ?></p>

                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $run['role']; ?>">
                            <?php
                            if($run['role']==0)
                            {
                             ?>
                              <option  selected value="0">normal User</option>
                              <option value="1">Admin</option>
                            <?php
                           }
                           else{
                             ?>
                             <option value="0">normal User</option>
                             <option selected value="1">Admin</option>
                           <?php } ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
