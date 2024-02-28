<?php
session_start();
include("config.php");
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');

$select_pro="SELECT*FROM `product` as p inner join `category` as c on p.category=c.cat_id where status='1'";
$query=mysqli_query($connection,$select_pro);
if (mysqli_num_rows($query)>0) {
 


?>

<div class="container">
    <h1>Show Product</h1>
    <div class="btn">
<?php
//  categories
$sel="SELECT * from `category` as c ";
$run=mysqli_query($connection,$sel);
if (mysqli_num_rows($run)>0) {
  while ($row=mysqli_fetch_assoc($run)) {
    // fetch category wise products
    $id=$_SESSION['id'];
    $_SESSION['id']=$row['cat_id'];
    $cat_wise="SELECT * from `product` as p inner join `category` as c on p.category=c.cat_id where p.category='$id' and status='1'";
    $exe=mysqli_query($connection,$cat_wise);
    if ($run) {
    }
?>
    <button class="btn btn-outline-dark"><?php echo $row['cat_name']?></button>
   <?php
}
}
   ?>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category </th>
      <th scope="col">price</th>
      <th scope="col">Image</th>
      <th scope="col">Trash</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <?php
   while ($pro=mysqli_fetch_assoc($query)) {
    
  
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $pro['pro_name']?></th>
      <td><?php echo $pro['pro_des']?></td>
      <td><?php echo $pro['category']?></td>
      <td><?php echo $pro['pro_price']?></td>
      <td><img src="<?php echo 'images/'.$pro['pro_image']?>" width="100px" height="100px" ></td>
      <td><a href="trash.php?id=<?php echo $pro['pro_id']?>" class="btn btn-danger">Trash</a></td>
      <td><a href="proupdate.php?id=<?php echo $pro['pro_id']?>" class="btn btn-success">Update</a></td>
    </tr>
    <?php
     }
    }
    ?>
  </tbody>
</table>
</div>

<?php
include('includes/footer.php');
?>