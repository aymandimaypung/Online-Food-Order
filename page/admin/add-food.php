<?php include 'include/header.php'; ?>

<div class="main-content">

<div class="wrapper">

    <h1>Add Food</h1>

    <br><br>

    <?php
      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" placeholder="Enter Food Title">
                </td>
            </tr>

            <tr>
                <td>Description: </td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Enter Description"></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>

            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php
                        $sql = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count > 0)
                        {
                          while($row = mysqli_fetch_assoc($res))
                          {
                            $id = $row['id'];
                            $title = $row['title'];
                            ?>
                            <option value="<?=$id;?>"><?=$title;?></option>
                            <?php
                          }
                        }
                        else
                        {
                          ?>
                          <option value="0">No Category Found</option>
                          <?php
                        }
                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>
        </table>
    </form>
    
    <!-- Save Data in Database -->
    <?php
        if(isset($_POST['submit']))
        {
          $title = $_POST['title'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $category = $_POST['category'];
          
          if(isset($_POST['featured']))
          {
            $featured = $_POST['featured'];
          }
          else
          {
            $featured = "No";
          }

          if(isset($_POST['active']))
          {
            $active = $_POST['active'];
          }
          else
          {
            $active = "No";
          }

          // Check if Image is Selected
          if(isset($_FILES['image']))
          {
            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
              $extension = end(explode('.', $image_name));
              $image_name = "Food-Name".rand(000, 999).".".$extension;
              $source = $_FILES['image']['tmp_name'];
              $destination = "../../images/food/".$image_name;

              // Finally Upload Image
              $upload = move_uploaded_file($source, $destination);

              // Check if Image is Uploaded
              if($upload == FALSE)
              {
                $_SESSION[upload] = "<div class='error'>Failed to Upload Image</div>";
                ?>
                <script>
                  window.location.href="add-food.php";
                </script>
              <?php
                die();  
              }
            }
          }
          else
          {
            $image_name = "";
          }

          $sql2 = "INSERT INTO tbl_food SET 
              title = '$title',
              description = '$description',
              price = $price,
              image_name = '$image_name',
              category_id = $category,
              featured = '$featured',
              active = '$active'
          ";

          $res2 = mysqli_query($conn, $sql2);

          if($res2 == TRUE)
          {
              $_SESSION['add'] = '<div class="success">Food Succesfully added</div>';
              ?>
                <script>window.location.href="manage-food.php";</script>
              <?php
          }
          else
          {
            $_SESSION['add'] = '<div class="error">Failed to Add Food</div>';
            ?>
            <script>window.location.href="manage-food.php";</script>
          <?php
          }
        }
    ?>

</div>

</div>

<?php include 'include/footer.php'; ?>