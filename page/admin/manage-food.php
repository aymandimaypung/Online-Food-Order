<?php 
  include 'include/header.php'; 
?>

  <!-- Main Content Section Starts -->
  <div class="main-content">
    <div class="wrapper">
      <h1>Manage Food</h1>
      <br><br>

      <?php
      // Successfully Added Food Message
      if(isset($_SESSION['add']))
      {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
      // Successfully deleted Message
      if(isset($_SESSION['delete']))
      {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
      }
      // Failed to remove image-path Message
      if(isset($_SESSION['remove']))
      {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
      }

      if(isset($_SESSION['unauthorized']))
      {
        echo $_SESSION['unauthorized'];
        unset($_SESSION['unauthorized']);
      }

      // Failed to upload Image Message
      if(isset($_SESSION['upload-image']))
      {
        echo $_SESSION['upload-image'];
        unset($_SESSION['upload-image']);
      }

      
      // Failed to Remove Image Message
      if(isset($_SESSION['remove-image']))
      {
        echo $_SESSION['remove-image'];
        unset($_SESSION['remove-image']);
      }

      // Updated Success message
      if(isset($_SESSION['update']))
      {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
    ?>

    <br><br>

      <!-- Buttton to Add Admin -->
      <a href="add-food.php" class="btn-primary btn-lg">Add Food</a>

      <br><br><br>

      <table class="tbl-full" border="1">
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Price</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Action</th>
        </tr>

        <?php
          $sql = "SELECT * FROM tbl_food";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          $num = 1;

          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $price = $row['price'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>
              <tr>
                  <td><?=$num++;?></td>
                  <td><?=$title;?></td>
                  <td><?=$price;?></td>
                  <td>
                    <?php
                          if(!$image_name == "")
                          {
                            ?>
                            <img src="../../images/food/<?=$image_name;?>" style="width:50px;">
                            <?php
                          }
                          else
                          {
                            echo '<div class="error">Image not added<div>';
                          }
                    ?>
                  </td>
                  <td><?=$featured;?></td>
                  <td><?=$active;?></td>
                  <td>
                  <form action="" method="post">
                    <a href="update-food.php?id=<?=$id;?>" class="btn-secondary">Update Food</a>
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="hidden" name="image_name" value="<?=$image_name;?>">
                    <input type="submit" value="DELETE" name="submit"   class="btn-danger btn-xs">
                  </form>
                  </td>
              </tr>
              <?php

            }
          }
          else
          {
            echo '<tr><td colspan="7" class="error">Food Not Added Yet</td></tr>';
          }
        ?>

      </table>
    </div>
  </div>
  <!-- Main Content Section Ends -->

<?php
  include 'include/footer.php';
  delete_food();
?>