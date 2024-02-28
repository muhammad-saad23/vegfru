<?php
include('config.php');
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

if (isset($_POST['submit'])) {
    $cat_name=$_POST['category_name'];
    $cat_image=$_FILES['category_image']['name'];
    $tmp_img=$_FILES['category_image']['tmp_name'];
    $img_size=$_FILES['category_image']['size'];

    move_uploaded_file($tmp_img,'images/'.$cat_image);

    $insert_cat="INSERT INTO `category`(`cat_name`,`cat_image`)values('$cat_name','$cat_image')";
    $run=mysqli_query($connection,$insert_cat);
}
?>

<div class="container">
    <h1>Add Categories</h1>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"  enctype="multipart/form-data" class="mb-4">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category name</label>
        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Category image</label>
        <input type="file" class="form-control" name="category_image" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
 
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php
$select_cat="SELECT * from `category`";
$run_select=mysqli_query($connection,$select_cat);
if (mysqli_num_rows($run_select)>0) {
    

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Image</th>
     
    </tr>
  </thead>
  <?php
  while ($row=mysqli_fetch_assoc($run_select)) {
    
  
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['cat_id']?></th>
      <td><?php echo $row['cat_name']?></td>
      <td><img src="<?php echo 'images/'.$row['cat_image']?>" width="12 0px" height="100px" alt=""></td>
      
    </tr>
    
  </tbody>

  <?php
  }
}
  ?>
</table>
</div>
<?php
include('includes/footer.php');

?>