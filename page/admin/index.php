<?php 
  include 'include/header.php'; 
?>


  <!-- Main Content Section Starts -->
  <div class="main-content">
    <div class="wrapper">
      <h1>DASHBOARD</h1>

      <?php

          if(isset($_SESSION['login']))
          {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
          }

          // Count Total Categories
          $sql = "SELECT * FROM tbl_category";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);

           // Count Total Foods
           $sql2 = "SELECT * FROM tbl_food";
           $res2 = mysqli_query($conn, $sql2);
           $count2 = mysqli_num_rows($res2);

            // Count Total Orders
          $sql3 = "SELECT * FROM tbl_order";
          $res3 = mysqli_query($conn, $sql3);
          $count3 = mysqli_num_rows($res3);
      ?>

      <div class="col-4 text-center">
        <h1><?=$count;?></h1>
        <br>
        Categories
      </div>

      <div class="col-4 text-center">
        <h1><?=$count2;?></h1>
        <br>
        Foods
      </div>

      <div class="col-4 text-center">
        <h1><?=$count3;?></h1>
        <br>
        Total Orders
      </div>

      <div class="col-4 text-center">

      <!-- Count total revenue -->
      <?php
        $sql4 = "SELECT SUM(total) AS total FROM tbl_order WHERE status='Delivered'";
        $res4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($res4);

        $total_revenue = $row4['total'];
      ?>
      
        <h1><?=$total_revenue;?></h1>
        <br>
        Revenue Generated
      </div>

      <div class="clearFix"></div>
    </div>
  </div>
  <!-- Main Content Section Ends -->

  <?php 
  include 'include/footer.php'; 
?>