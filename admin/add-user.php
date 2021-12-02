<?php include "header.php";


$msg=" ";
$first_name="";
$last_name="";
$username="";
$password="";
$role="";
if(isset($_POST['save']))
{
  $first_name=safe($_POST['fname']);
  $last_name=safe($_POST['lname']);
  $username=safe($_POST['user']);
  $password=safe(md5($_POST['password']));
  $role=safe($_POST['role']);

  $sql="SELECT username from user where username='$username'";
  $run=mysqli_query($conn,$sql) or die("Query Failed");
  if(mysqli_num_rows($run) > 0)
  {
    $msg="This Username Already Exist";
  }
  else{
      $sql1="INSERT into user(first_name,last_name,username,password,role)
    values('$first_name','$last_name','$username','$password','$role')";

    $runn=mysqli_query($conn,$sql1) or die('Query Insertion Failed');
    redirect("users");

}
}

 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php  echo  $_SERVER["PHP_SELF"] ?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control"  value="<?php echo $first_name; ?>" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $last_name; ?>" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" value="<?php echo $username; ?>" placeholder="Username" required>
                          <p class=" bg-danger text-danger mt-3"><?php echo $msg; ?></p>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
