<?php
  include 'include/header.php';
?>

  <div class="main-content">
    <div class="wrapper">
      <h1>Manage Category</h1>
      <br>

      <?php
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
              echo $_SESSION['remove'];
              unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
              echo $_SESSION['no-category-found'];
              unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
              echo $_SESSION['failed-remove'];
              unset($_SESSION['failed-remove']);
            }
      ?>
      <br><br>

      <!-- Buttton to Add Admin -->
      <a href="add-category.php" class="btn-primary btn-xs">Add Category</a>

      <br><br><br>

      <table class="tbl-full" border="1">
        <tr>
          <th>S.N.</th>
          <th>Title</th>
          <th>Image</th>
          <th>Featured</th>
          <th>Active</th>
          <th>Actions</th>
        </tr>

        <?php
          $sql = "SELECT * From tbl_category";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          $num = 1;

          if($count > 0)
          {
            while($row = mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title = $row['title'];
              $image_name = $row['image_name'];
              $featured = $row['featured'];
              $active = $row['active'];

              ?>

                  <tr>
                    <td><?=$num++;?></td>
                    <td><?=$title;?></td>
                    <td>
                        <?php
                          if(!$image_name == "")
                          {
                            ?>
                            <img src="../../images/category/<?=$image_name;?>" style="width:50px;">
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
                        <input type="hidden" name="image_name" value="<?=$image_name;?>">
                          <input type="hidden" name="id" value="<?=$id;?>">
                          <a href="update-category.php?id=<?=$id;?>" class="btn-secondary btn-xs">Update Category</a>
                          <input type="submit" value="DELETE" name="delete" class="btn-danger btn-xs">
                      </form>
                    </td>
                  </tr>

              <?php
            }
          }
          else
          {
              ?>

              <tr>
                  <td colspan="6"><div class="error">No Category Added</div></td>
              </tr>

              <?php
          }

        ?>

      </table>
    </div>
  </div>

<?php
  include 'include/footer.php';
  delete_category();
?>