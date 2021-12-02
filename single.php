<?php include 'header.php';
if(isset($_GET['id']) and $_GET['id']!=0 and $_GET['id']!=" ")
{
  $post_id=safe($_GET['id']);
}
else{
  redirect('index');
}

$sql="select post.*,category.category_name,user.username
 from post left join category on post.category=category.category_id
 left join user on post.author=user.user_id where post.post_id='$post_id' order by post.post_id desc  ";
 $query=mysqli_query($conn,$sql);

 ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php

                  if(mysqli_num_rows($query)>0)
                  {
                    while($row=mysqli_fetch_assoc($query)){ ?>

                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='<?php echo $load ?>/category/<?php echo $row['category'] ?>'><?php echo $row['category_name'] ;?>
                                    </a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='<?php echo $load ?>/author/<?php echo $row['author'] ?>'><?php echo $row['username'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'] ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo $load ?>/admin/upload/<?php echo $row['post_img'] ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description'] ?>
                            </p>
                        </div>
                    </div>
                  <?php }
                }else{
                  echo "<div class='alert alert-success'>Who Am I? </div>
                  <div class='alert alert-danger'>There is nothing to display.</div>";
                  }
                   ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
