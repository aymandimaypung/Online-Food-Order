<?php include 'include/header.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
            if(isset($_GET['id']))
            {
              $id = $_GET['id'];
              $sql = "SELECT * FROM tbl_category WHERE id=$id";
              $res = mysqli_query($conn, $sql);
              $count = mysqli_num_rows($res);

              if($count == 1)
              {
                  $row = mysqli_fetch_assoc($res);
                  $title = $row['title'];
                  $current_image = $row['image_name'];
                  $featured = $row['featured'];
                  $active = $row['active'];
              }
              else
              {
                  $_SESSION['no-category-found'] = '<div class="error">No Category Found</div>';
                  header("location:manage-category.php");
              }
            }
            else
            {
              header("location:manage-category.php");
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
          <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?=$title;?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                    
                      if($current_image != "")
                      {
                        ?>
                        <img src="../images/category/<?=$current_image;?>" width="100px">
                        <?php
                      }
                      else
                      {
                        echo '<div class="error">Image not Available</div>';
                      }
                    
                    ?>
                </td>
            </tr>

            <tr>
                <td>New Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "Checked";}?> type="radio" name="featured" value="Yes">Yes
                    <input <?php if($featured=="No"){echo "Checked";}?> type="radio" name="featured" value="No">No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes"){echo "Checked";}?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=="No"){echo "Checked";}?> type="radio" name="active" value="No">No
                </td>
            </tr>
            
            <tr>
                <td>
                <input type="hidden" name="current_image" value="<?=$current_image;?>">
                <input type="hidden" name="id" value="<?=$id;?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
            </tr>

          </table>
        </form>
    </div>
</div>

<?php 
    include 'include/footer.php'; 
    update_category();
?>