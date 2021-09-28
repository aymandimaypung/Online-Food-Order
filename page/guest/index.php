<?php
    include 'include/header.php';
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="post">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- SESSION MESSAGES HERE -->
    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                              <a href="category-foods.php?category_id=<?=$id;?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($image_name == "")
                                        {
                                            echo '<div class="error">Image Not Available</div>';
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="../../images/category/<?=$image_name;?>" alt="Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    <h3 class="float-text text-white"><?=$title;?></h3>
                                </div>
                            </a>
                        <?php
                    }
                }
                else
                {
                    echo '<div class="error">No Category Available</div>';
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // Getting Foods from database that are both active and featured
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='yes' LIMIT 6";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name == "")
                                        {
                                            echo '<div class="error">Image Not Available</div>';
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="../../images/food/<?=$image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?=$title;?></h4>
                                    <p class="food-price"><?=$price;?></p>
                                    <p class="food-detail">
                                        <?=$description;?>
                                    </p>
                                    <br>

                                    <a href="order.php?food_id=<?=$id;?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo '<div class="error">Food Not Available</div>';
                }
            ?>
        
            <div class="clearfix"></div>
     
        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php 
    include 'include/footer.php';
?>