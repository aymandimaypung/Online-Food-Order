<?php 
  include 'include/header.php'; 
?>

  <!-- Main Content Section Starts -->
  <div class="main-content">
    <div class="wrapper">
      <h1>Manage Order</h1>

      <br><br>
<center>
      <?php
        if(isset($_SESSION['update'])){
          echo $_SESSION['update'];
          unset($_SESSION['update']);
        }
      ?>
 </center>

      <table class="tbl-full" border="1">
        <tr>
          <th width="2%">S.N.</th>
          <th width="10%">Food</th>
          <th width="7%">Price</th>
          <th width="2%">Qty.</th>
          <th width="7%">Total</th>
          <th width="10%">Order Date</th>
          <th width="8%">Status</th>
          <th width="8%">Customer Name</th>
          <th width="10%">Contact</th>
          <th width="14%">Email</th>
          <th width="12%">Address</th>
          <th width="8%">Action</th>
        </tr>

        <?php
          // Get all The orders from database
          $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          $num = 1;

          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $food = $row['food'];
              $price = $row['price'];
              $qty = $row['qty'];
              $total = $row['total'];
              $order_date = $row['order_date'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
              $customer_address = $row['customer_address'];

              ?>
                <tr>
                  <td><?=$num++;?></td>
                  <td><?=$food;?></td>
                  <td><?=$price;?></td>
                  <td><?=$qty;?></td>
                  <td><?=$total;?></td>
                  <td><?=$order_date;?></td>
                  <td>
                    <?php
                        // Ordered, On Delivery, Delivered, Cancelled
                        if($status == "Ordered")
                        {
                          echo "<label>$status</lebel>";
                        }
                        if($status == "On Delivery")
                        {
                          echo "<label style='color: orange'>$status</lebel>";
                        }
                        if($status == "Delivered")
                        {
                          echo "<label style='color: green'>$status</lebel";
                        }
                        if($status == "Cancelled")
                        {
                          echo "<labe style='color: red'>$status</lebel>";
                        }
                    ?>
                  </td>
                  <td><?=$customer_name;?></td>
                  <td><?=$customer_contact;?></td>
                  <td><?=$customer_email;?></td>
                  <td><?=$customer_address;?></td>
                  <td>
                    <a href="update-order.php?id=<?=$id;?>" class="btn-secondary">Update Order</a>
                  </td>
                </tr>
              <?php
            }
          }
          else
          {
            echo '<tr><td class="error">Orders Not Available</td></tr>';
          }
        ?>

      </table>
    </div>
  </div>
  <!-- Main Content Section Ends -->

<?php
  include 'include/footer.php';
?>