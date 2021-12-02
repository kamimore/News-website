<?php include "header.php";
$msg=" ";
if(isset($_POST['save']))
{
  $category_name=safe($_POST['cat']);
  $sql="Select * from category where category_name='$category_name'";
  $query=mysqli_query($conn,$sql);
  if(mysqli_num_rows($query)>0)
  {
    $msg="<div class='text text-danger'>Category Already Present</div>";
  }
  else
  {
    $sql1="Insert into category(category_name)  value('$category_name')";
    if(mysqli_query($conn,$sql1))
    {
      redirect('category');
    }
    else{
      $msg="<div class='text text-danger'>Query Failed</div>";
    }
  }
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                        <?php echo $msg; ?>
                      </div>

                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
