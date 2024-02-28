<?php
include("config.php");
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');


$select_pro="SELECT*FROM `product` as p inner join `category` as c on p.category=c.cat_id where status='0'";
$query=mysqli_query($connection,$select_pro);
if (mysqli_num_rows($query)>0) {
 

?>

<div class="container">
    <h1>Show Trash products</h1>
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
      <td><a href="prodelete.php?id=<?php echo $pro['pro_id']?>" class="btn btn-danger">Delete</a></td>
      <td><a href="restore.php?id=<?php echo $pro['pro_id']?>" class="btn btn-warning">Restore</a></td>
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