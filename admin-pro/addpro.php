<?php
include('config.php');

include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

if (isset($_POST['submit'])) {
    $pro_name=$_POST['product_name'];
    $pro_des=$_POST['product_des'];
    $pro_cat=$_POST['category'];
    $pro_price=$_POST['product_price'];
    $pro_image=$_FILES['product_image']['name'];
    $tmp_name=$_FILES['product_image']['tmp_name'];
    $image_size=$_FILES['product_image']['size'];

    move_uploaded_file($tmp_name,'images/'.$pro_image);
    $pro_insert="INSERT into `product`(`pro_name`,`pro_des`,`category`,`pro_price`,`pro_image`)values('$pro_name','$pro_des','$pro_cat','$pro_price','$pro_image')";
    $run_pro=mysqli_query($connection,$pro_insert);

    if ($run_pro) {
        echo "<script>alert('product add')</script>";
    }
}

?>

<div class="container">
    <h1>Add Products</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product name</label>
        <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <select class="form-select" name="category" aria-label="Default select example">
    <option selected>Open this select menu</option>
        <?php
        $select="SELECT * FROM `category`";
        $run=mysqli_query($connection,$select);
        if (mysqli_num_rows($run)>0) {
            while ($cat=mysqli_fetch_assoc($run)) {              
                echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';    
            }
        }
        ?>
   
</select>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Product Description</label>
        <textarea type="text" class="form-control"name="product_des"  id="exampleInputPassword1"></textarea>
    </div>
    <div class="mb-3 ">
        <label class="form-check-label" for="exampleCheck1">Product Price</label>
        <input type="text" name="product_price" class="form-control" id="exampleCheck1">
    </div>
    <div class="mb-3">
  <label for="formFile" class="form-label">Product Image</label>
  <input class="form-control" type="file" name="product_image" id="formFile">
</div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
include('includes/footer.php');

?>