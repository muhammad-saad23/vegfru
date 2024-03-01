<?php
session_start();
include("config.php");
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');  
?>
   <h1 class="text-center text-uppercase mb-3">Dashboard</h1>
<?php
$sel_cat="SELECT c.cat_name,count(*) as catfetch from `category` as c";
$run_cat=mysqli_query($connection,$sel_cat);
if (mysqli_num_rows($run_cat)>0) {
  while ($cat=mysqli_fetch_assoc($run_cat)) {
  $cat_fetch=$cat['catfetch'];
 
?>

   <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0 ">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Total Categories</h1>
        <h4 class="card-text"><?php echo $cat_fetch?></h4>     
      </div>
    </div>
  </div>
  <?php
  }
}
  ?>
<?php
$sel_pro="SELECT count(*) as profetch from `product` as p where status='1'";
$run_pro=mysqli_query($connection,$sel_pro);
if (mysqli_num_rows($run_pro)>0) {
  while ($pro=mysqli_fetch_assoc($run_pro)) {
    $pro_fetch=$pro['profetch'];
  
?>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Total Products</h1>
        <h4 class="card-text"><?php echo $pro_fetch?></h4> 
      </div>
    </div>
  </div>
  <?php
  }
}
  ?>
<?php
// fetch categories and count products
$sel="SELECT * from `category` as c";
$run=mysqli_query($connection,$sel);
if (mysqli_num_rows($run)>0) {
  while ($name=mysqli_fetch_assoc($run)) {
    $_SESSION['id']=$name['cat_id']; 
    ?>
<?php

$id=$_SESSION['id'];
$pro="SELECT p.pro_id,count(p.category) as countpro from `product` as p inner join `category` as c on p.category=c.cat_id where p.category='$id' and status='1'";
$run_count=mysqli_query($connection,$pro);
if (mysqli_num_rows($run_count)>0) {
  while ($count=mysqli_fetch_assoc($run_count)) {
    $count_pro=$count['countpro'];
    
  
?>
  <div class="col-sm-6 mb-4">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title"><?php echo $name['cat_name']?></h1>
        <h4 class="card-text"><?php echo $count_pro?></h4> 
      </div>
    </div>
  </div>

  <?php
  }
}
}
}
  ?>
</div>


<?php

 
include('includes/footer.php');
?>


