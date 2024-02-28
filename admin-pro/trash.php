<?php
include("config.php");

$pro_id=$_GET['id'];

$select_pro="UPDATE `product` set `status`='0' where pro_id='$pro_id'";
$query=mysqli_query($connection,$select_pro);

if ($query) {
    echo "<script>alert('Product is now in trash')
    window.location.href='showtrash.php'
    </script>";
}else{
    echo "query failed";
}
 

?>
