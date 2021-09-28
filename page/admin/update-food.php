<?php include 'include/header.php'; ?>

<?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_food WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count == 1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $current_image = $row['image_name'];
                    $current_category = $row['category_id'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-food'] = '<div class="error">No Food Found</div>';
                    ?>
                        <script>window.location.href="manage-food.php";</script>
                    <?php
                }
            }
            else
            {
                ?>
                <script>window.location.href="manage-food.php";</script>
            <?php
            }
        ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
          <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?=$title;?>">
                </td>
            </tr>

            <tr>
                <td>Decription: </td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?=$description;?></textarea>
                </td>
            </tr>

            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?=$price;?>">
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php 
                    
                      if($current_image != "")
                      {
                        ?>
                        <img src="../../images/food/<?=$current_image;?>" width="100px">
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
                <td>Category: </td>
                <td>
                    <select name="category">

                        <?php
                        $sql2 = "SELECT * FROM tbl_category WHERE active = 'Yes'";
                        $res2 = mysqli_query($conn, $sql2);
                        $count = mysqli_num_rows($res2);
                        if($count > 0)
                        {
                          while($row2 = mysqli_fetch_assoc($res2))
                          {
                            $category_id = $row2['id'];
                            $category_title = $row2['title'];
                            ?>
                            <option <?php if($current_category == $category_id){echo 'selected';}?> value="<?=$category_id;?>"><?=$category_title;?></option>
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
                <input type="hidden" name="id" value="<?=$id;?>">
                <input type="hidden" name="current_image" value="<?=$current_image;?>">
                
                <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>

          </table>
        </form>
    </div>
</div>

<?php 
    include 'include/footer.php'; 
    update_food();
?>