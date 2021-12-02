<?php include 'header.php';
if(isset($_GET['search']) and $_GET['search']!="" and $_GET['search']!="0")
{
  $search=safe($_GET['search']);
}
else{
  redirect('index');
}
if(isset($_GET['page']) and $_GET['page']!="" and !$_GET['page']<1){
  $page=safe($_GET['page']);
}else{
  $page=1;
}
$limit=3;
$offset=($page-1)*$limit;

/*$sqlauth="select username from user where user_id='$search'";
$queryauth=mysqli_query($conn,$sqlauth);
$rowauth=mysqli_fetch_assoc($queryauth);
$auth_name=$rowauth['username'];*/

 $sql="select post.*,category.category_name,user.username
 from post left join category on post.category=category.category_id
 left join user on post.author=user.user_id
 where post.title LIKE '%$search%' or post.description LIKE '%$search%' or post.author LIKE '%$search%' order by post.post_id desc  ";

 $query=mysqli_query($conn,$sql);
 $total_records=mysqli_num_rows($query);
 if($total_records<$limit)
 {
   $limit=$total_records;
 }
 $sql.="limit $offset,$limit";
 $query=mysqli_query($conn,$sql);
 ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php if(mysqli_num_rows($query)>0)
                {
                  $total_pages=ceil($total_records/$limit);

                  ?>
                <div class="post-container">
                  <h2 class="page-heading"><?php echo $search ?></h2>
                  <?php
                  while($row=mysqli_fetch_assoc($query))
                  {
                   ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img"
                                href="<?php echo $load ?>/single?id=<?php echo $row['post_id'] ?>">
                                <img src="<?php echo $load ?>/admin/upload/<?php echo $row['post_img'] ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='<?php echo $load ?>/single/<?php echo $row['post_id'] ?>'><?php echo $row['title'] ;?></a></h3>
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
                                            <?php echo $row['post_date'] ;?>
                                        </span>
                                    </div>
                                    <p class="description">
                                      <?php echo substr($row['description'],0,200) ?>......

                                    </p>
                                    <a class='read-more pull-right' href='<?php echo $load ?>/single/<?php echo $row['post_id'] ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>


                  <?php } ?>
                  <?php if($total_records>0) {?>
                  <ul class='pagination admin-pagination'>
                    <?php  if($page>1){?>
                  <li class=''><a href='<?php echo $load ?>/search/<?php echo $search ?>&age=<?php echo $page-1 ?>'>Prev</a></li>;
                <?php  }?>
                    <?php
                    for($i=1;$i<=$total_pages;$i++)
                    {
                      $active=($page==$i)?'active':'';
                      echo "<li class='{$active}' ><a href='{$load}/search/$search/$i'>{$i}</a></li>";
                    }

                     ?>
                <?php if($page<$total_pages){ ?>
                     <li class=''><a href='<?php echo $load ?>/search/<?php echo $search ?>/<?php echo $page+1 ?>'>Next</a></li>;
                   <?php } ?>
                  </ul>
                <?php } else{
                echo "<div class='alert alert-success'>Who Am I? </div>
                <div class='alert alert-danger'>There is nothing to display.</div>";
                } ?>

                </div>
              <?php } ?>
                <!-- /post-container -->

            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
