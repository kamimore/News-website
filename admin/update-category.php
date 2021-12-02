<?php include "header.php";
$msg="";
if(isset($_POST['sumbit']))
{
  //pxr($_POST);
  $cat_id=safe($_POST['cat_id']);
  $cat_name=safe($_POST['cat_name']);
  $sql1="select * from category where category_name='$cat_name'";
  $query1=mysqli_query($conn,$sql1);
  if(mysqli_num_rows($query1)>0)
  {
    $msg="<div class='text text-danger'>Category Already Present</div>";
  }
  else
  {
    $sql2="Update category set category_name='$cat_name'
     where category_id='$cat_id'";
    if(mysqli_query($conn,$sql2))
    {
      redirect('category');
    }
    else{
      $msg="<div class='text text-danger'>Query Failed</div>";
    }
  }
  ////
  //$sql1="Update category set cat_name"
}
if(isset($_GET['id']) and $_GET['id']!="" and $_GET['id']!="0")
{
  $id=safe($_GET['id']);
  $sql="Select * from category where category_id='$id'";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);
}
else{
  redirect('category');
}

//include "function.php";
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" autofocus required>
                          <?php echo $msg; ?>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
