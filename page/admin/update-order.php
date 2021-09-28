<?php include 'include/header.php'; ?>

  <div class="main-content">
      <div class="wrapper">

        <h1>Update Order</h1>
        <br><br>

        <?php
          if(isset($_GET['id']))
          {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_order WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count == 1)
            {
              $row = mysqli_fetch_assoc($res);

              $food = $row['food'];
              $price = $row['price'];
              $qty = $row['qty'];
              $status = $row['status'];
              $customer_name = $row['customer_name'];
              $customer_contact = $row['customer_contact'];
              $customer_email = $row['customer_email'];
              $customer_address = $row['customer_address'];
            }
            else
            {
              header('location:manage-order.php');
            }
          }
          else
          {
            header('location:manage-order.php');
          }
        ?>

        <form action="" method="POST">

          <table class="tbl-30">
            <tr>
              <td>Food Name</td>
              <td><b><?=$food;?></b></td>
            </tr>

            <tr>
              <td>Price</td>
              <td><b><?=$price;?></b></td>
            </tr>

            <tr>
              <td>Qty</td>
              <td>
                <input type="number" name="qty" value="<?=$qty;?>">
              </td>
            </tr>

            <tr>
              <td>Status</td>
              <td>
                  <select name="status">
                      <option <?php if($status == 'Ordered'){echo 'selected';}?> value="Ordered">Ordered</option>
                      <option <?php if($status == 'On Delivery'){echo 'selected';}?> value="On Delivery">On Delivery</option>
                      <option <?php if($status == 'Delivered'){echo 'selected';}?> value="Delivered">Delivered</option>
                      <option <?php if($status == 'Cancelled'){echo 'selected';}?> value="Cancelled">Cancelled</option>
                  </select>
              </td>
            </tr>

            <tr>
              <td>Customer Name</td>
              <td>
                <input type="text" name="customer_name" value="<?=$customer_name;?>">
              </td>
            </tr>

            <tr>
              <td>Customer Contact</td>
              <td>
                <input type="text" name="customer_contact" value="<?=$customer_contact;?>">
              </td>
            </tr>

            <tr>
              <td>Customer Email</td>
              <td>
                <input type="text" name="customer_email" value="<?=$customer_email;?>">
              </td>
            </tr>

            <tr>
              <td>Customer Address</td>
              <td>
                <textarea name="customer_address" id="" cols="30" rows="5"><?=$customer_address;?></textarea>
              </td>
            </tr>

            <tr>
              <td colspan="2">
              <input type="hidden" name="id" value="<?=$id;?>">
              <input type="hidden" name="price" value="<?=$price;?>">
                <input type="submit" name="submit" value="Update Order" class="btn-secondary">
              </td>
            </tr>
          </table>

        </form>

      </div>
  </div>


<?php 
  include 'include/footer.php'; 
  update_order();
?>