<?php
include('config.php');

if (isset($_POST['update'])) {
    $update_id=$_POST['product_id'];
    $update_name=$_POST['product_name'];
    $update_des=$_POST['product_des'];
    $update_cat=$_POST['category'];
    $update_price=$_POST['product_price'];
    $update_image=$_FILES['product_image']['name'];
    $tmp_image=$_FILES['product_image']['tmp_name'];
    $image_size=$_FILES['product_image']['size'];

    move_uploaded_file($tmp_image,'images/'.$update_image);

    $update="UPDATE `product` set `pro_name`='$update_name',`pro_des`='$update_des',`category`='$update_cat',`pro_price`='$update_price',`pro_image`='$update_image' where pro_id='$update_id'";
    $update_run=mysqli_query($connection,$update);

    if ($update_run) {
        echo "<script>alert('Product Updated')
        window.location.href='showpro.php'</script> ";
    }
    else {
        echo "query failed";
    }

}
?>