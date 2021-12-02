<?php include "header.php";
if(isset($_GET['id']) and $_GET['id']!=""  and $_GET['id']>=1)
{
  $user_id=safe($_GET['id']);
}
else{
  redirect('post');
}

$rowforchecking=mysqli_fetch_assoc(mysqli_query($conn,"select author from post where post_id='$user_id'"));

if(($rowforchecking['author']==$_SESSION['user_id']) or $_SESSION['role']==1)
{
  $sql="select post.*,category.category_name,user.username
  from post left join category on post.category=category.category_id
  left join user on post.author=user.user_id where post.post_id=$user_id order by post.post_id desc  ";

  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($query);

}
else{
  redirect('post');
}

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
  <form action="<?php echo $load ?>/admin/save-update-post" method="POST" enctype="multipart/form-data" autocomplete="off">
   <div class="form-group">
      <input type="hidden" name="post_id" class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
   </div>
   <div class="form-group">
      <label for="exampleInputTile">Title</label>
      <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title'] ?>">
   </div>
   <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <textarea name="postdesc" class="form-control" rows="5" required> <?php echo $row['description'] ?>
      </textarea>
   </div>
   <div class="form-group">
      <label for="exampleInputCategory">Category</label>
      <input type="hidden" name="old_cat" value="<?php echo $row['category'] ;?>">
      <select name="category" class="form-control" >
         <option disabled> Select Category</option>
         <?php
            $sql1="select * from category";
            $query1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($query1) > 0){
              $selected="";
              while($row1=mysqli_fetch_assoc($query1))
              {
                $selected=($row['category']==$row1['category_id'])?'selected':'';
                echo "<option  value='{$row1['category_id']}' $selected>{$row1['category_name']}</option>";
              }
            }
             ?>
      </select>
   </div>
   <div class="form-group">
      <label for="">Post image</label>
      <input type="file" name="new-image">
      <img  src="<?php echo $load?>/admin/upload/<?php echo $row['post_img'] ?>" height="150px">
      <input type="hidden" name="old-image" value="<?php echo $row['post_img'] ?>">
   </div>
   <div class="form-group">
     <input type="submit" name="submit" class="btn btn-primary" value="Update" />
   </div>
</form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
