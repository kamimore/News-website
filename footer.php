<?php
 $rownew=mysqli_fetch_assoc(mysqli_query($conn,"select * from setting"));
 $footerdes=$rownew['footerdes'];
  ?>
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span><?php echo $footerdes; ?></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
  /*let x=location.pathname;
  //console.log(x);
  let y=x.split('/');
  let z=y[y.length-1];
  var txt=z.replace('.php','');
//  console.log(txt);
  var titletxt=document.getElementsByClassName('titletxt')[0].innerHTML=txt.toUpperCase();
  */

</script>
