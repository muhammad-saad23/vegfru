<?php
include('config.php');

$pro_id=$_GET['id'];
$delete="DELETE FROM `product` where pro_id='$pro_id'";
$delete_run=mysqli_query($connection,$delete);

if ($delete_run) {
    echo "<script>alert('product Deleted')
    window.location.href='showpro.php'</script>";  
    // header('location:showpro.php');
}
else{
    echo "query failed";
}
?>