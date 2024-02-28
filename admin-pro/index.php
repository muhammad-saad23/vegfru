<?php
session_start();
include("config.php");
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');  
// fetch categories

?>
   <h1 class="text-center text-uppercase">Dashboard</h1>

   <?php
   $sel="SELECT * FROM `category` as c";
   $run_query=mysqli_query($connection,$sel);
   if (mysqli_num_rows($run_query)>0) {
     while ($row=mysqli_fetch_assoc($run_query)) {
   ?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
      <?php 
      // product counts 
      $id = $_SESSION['id'];
      $pro_count = "SELECT c.cat_id, count(*) as profetch 
                    FROM `product` as p 
                    INNER JOIN `category` as c ON p.category = c.cat_id 
                    WHERE p.category = '$id'";
      $pro_run = mysqli_query($connection, $pro_count);
      
      if ($pro_run) {
          if (mysqli_num_rows($pro_run) > 0) {
              while ($count = mysqli_fetch_assoc($pro_run)) {
                  $_SESSION['id'] = $count['cat_id']; // Assign the category ID to the session
                  $pro_fetch = $count['profetch']; // Assign the product count to $pro_fetch
           
          
      ?>
    <h1 class="card-title"><?php echo $row['cat_name']?></h1>
    <h5 class="card-title"><?php echo $pro_fetch?></h5>
   
  </div>
</div>


<?php
}
}

      }
}
}
include('includes/footer.php');
?>


