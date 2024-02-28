<?php
include('config.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

$get_id=$_GET['id'];
$select="SELECT * FROM `product` as p inner join `category` as c on p.category=c.cat_id where p.pro_id='$get_id'";
$run_query=mysqli_query($connection,$select);
if (mysqli_num_rows($run_query)>0) {
    while ($val=mysqli_fetch_assoc($run_query)) {
        
   

?>

<div class="container">
    <h1>Add Products</h1>
<form action="update.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product name</label>
        <input type="hidden" class="form-control" name="product_id" value="<?php echo $val['pro_id']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
        <input type="text" class="form-control" name="product_name" value="<?php echo $val['pro_name']?>" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <select class="form-select" name="category" value="<?php echo $val['category']?> aria-label="Default select example">
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
        <textarea type="text" class="form-control"name="product_des" value="<?php echo $val['pro_des']?>"  id="exampleInputPassword1"></textarea>
    </div>
    <div class="mb-3 ">
        <label class="form-check-label" for="exampleCheck1">Product Price</label>
        <input type="text" name="product_price" class="form-control" value="<?php echo $val['pro_price']?>" id="exampleCheck1">
    </div>
    <div class="mb-3">
  <label for="formFile" class="form-label">Product Image</label>
  <input class="form-control" type="file" name="product_image" value="<?php echo 'images/'. $val['pro_image']?>" id="formFile">
</div> 
    <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
 }
}
include('includes/footer.php');

?>