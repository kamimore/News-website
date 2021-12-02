<?php
 include "header.php";

 if(isset($_POST['submit']))
 {
   //pxr($_POST);
 if(empty($_FILES['new-image']['name'])){
   $file_name=$_POST['old-image'];
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
   $extensions= array('jpeg','jpg','png');
   if(in_array($file_ext,$extensions)===false)
   {
     $errors[]="This extension file not  allowed,Please choose a JPG or PNG format";
   }
   if($file_size > 2097152){   //1mb=1024kb and 1kb=1024bytes
     $errors[]="File size must be 2mb or lower";

   }
   if(empty($errors)==true){
     $file_name=strtotime("now")."-".$file_name;
     move_uploaded_file($file_tmp,"images/".$file_name);

   }
   else{
     print_r($errors);
     die();
   }

 }

   $websitename=$_POST['websitename'];
   $footerdes=$_POST['footerdes'];

   $sql="UPDATE setting SET websitename='$websitename',footerdes='$footerdes',logo='{$file_name}'";
   $result=mysqli_query($conn,$sql);
   if($result){
   redirect('setting');
   }
   else{
   echo "Query failed";
   }
   }

   $rownew=mysqli_fetch_assoc(mysqli_query($conn,"select * from setting"));
   $website=$rownew['websitename'];
   $footerdes=$rownew['footerdes'];
   $logo=$rownew['logo'];

   ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add Setting</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Website Name</label>
                          <input type="text" name="websitename" class="form-control" value="<?php echo $website; ?>" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Description</label>
                          <input name="footerdes" class="form-control" rows="5" value="<?php echo $footerdes; ?>" required>
                      </div>
                      <div class="form-group">
                         <label for="">Post image</label>
                         <input type="file" name="new-image">
                         <img  src="<?php echo $load?>/admin/images/<?php echo $logo ?>" height="150px">
                         <input type="hidden" name="old-image" value="<?php echo $logo ?>">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
