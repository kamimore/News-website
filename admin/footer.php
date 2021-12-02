<?php

 ?>
<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2022 News | Powered by vayuananda</span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
<script type="text/javascript">

  let x=location.pathname;
  let y=x.split('/');
  let z=y[y.length-1];
  var txt=z.replace('.php','');
  var titletxt=document.getElementsByClassName('titletxt')[0].innerHTML=txt.toUpperCase();

  var array_cat=[];
  var role=<?php echo $_SESSION['role']?>;
  //console.log(role);
  if(role==1){
    array_cat=["post","category","users","setting"];
  }
  else{
    array_cat=["post","users"];
  }
  //console.log(array_cat);
  for(var i=0;i<array_cat.length;i++)
  {
  var xactive=document.getElementById(`${array_cat[i]}`);
  //console.log(xactive);

  xactive.classList.remove('tab_active');
  }
  //console.log(txt);
  var change=document.getElementById(`${txt}`).classList.add('tab_active');


</script>
