<?php
include("config.php");

$get_id=$_GET['id'];
$restore="UPDATE `product` set `status`='1' where pro_id='$get_id'";
$run=mysqli_query($connection,$restore);

if ($run) {
    echo "<script>alert('Product is now Restore')
    window.location.href='showpro.php'
    </script>";
}else{
    echo "query failed";
}

?>