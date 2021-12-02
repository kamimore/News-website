<?php

 function px($data)
 {
   echo "<pre>";
   print_r($data);
   echo "</pre>";
 }
 function pxr($data)
 {
   echo "<pre>";
   print_r($data);
   echo "</pre>";
   die();
 }
 function safe($data)
 {
   global $conn;
   $fast=mysqli_real_escape_string($conn,$data);
   return $fast;
 }
function redirect($data)
{
  ?>
  <script>
  window.location.href='<?php echo $data; ?>';

  </script>
<?php
die();
}


 ?>
