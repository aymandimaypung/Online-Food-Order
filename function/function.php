<?php

function add_user()
{
  if(isset($_POST['submit']))
  {
    GLOBAL $conn;
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption

    // SQL query
    $sql = "INSERT INTO tbl_admin SET 
        full_name ='$full_name',
        username = '$username',
        password = '$password'
    ";

    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res == TRUE)
    {
      $_SESSION['add'] = "<div class='success'>Admin Added Succesfully</div>";
      ?>
        <script>
          window.location.href="manage-admin.php";
        </script>
      <?php
    }
    else{
      $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
      ?>
        <script>
          window.location.href="add-admin.php";
        </script>
      <?php
    }
  }
}

function update_password()
{
  if(isset($_POST['submit']))
  {
    GLOBAL $conn;
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";

    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
    	$count = mysqli_num_rows($res);

        if($count == 1)
        {
            if($new_password == $confirm_password)
            {
                $sql2 = "UPDATE tbl_admin SET
                    password = '$new_password'
                     WHERE id= $id";
                

                $res2 = mysqli_query($conn, $sql2);

                if($res == TRUE)
                {
                    $_SESSION['change-pwd'] = "<div class='success'>Password Change Successfully. </div>";
                    ?>
                      <script>
                        window.location.href="manage-admin.php";
                      </script>
                    <?php
                }
                else
                {
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to change Password. </div>";
                    ?>
                      <script>
                        window.location.href="manage-admin.php";
                      </script>
                    <?php
                }
            }
            else
            {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Not Match. </div>";
                ?>
                  <script>
                    window.location.href="manage-admin.php";
                  </script>
                <?php
            }
          }
          else 
          {
              $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
              ?>
                <script>
                   window.location.href="manage-admin.php";
                </script>
              <?php
          }
    }
  }
}

function update_user()
{
  if(isset($_POST['update']))
  {
      GLOBAL $conn;
      $id = $_POST['id'];
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];

      $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' WHERE id = '$id'
      ";

      $res = mysqli_query($conn, $sql);
      
      if($res == TRUE)
      {
        $_SESSION['update'] = "<div class='success'>Admin Updated.</div>";
        ?>
          <script>
            window.location.href="manage-admin.php";
          </script>
        <?php
      }
      else
      {
        $_SESSION['update'] = "<div class='error'>Admin Updated Failed.</div>";
        header("location: manage-admin.php");
      }

  }
}

function delete_user()
{
  if(isset($_POST['delete']))
  {
    GLOBAL $conn;
    $id = $_POST['id'];

    $sql = "DELETE FROM tbl_admin WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
      $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully!</div>";
    }
    else
    {
      $_SESSION['delete'] = "<div class='error'>Failed to Delete!</div>";
    }
  }
   
}

// Login Function 
function login()
{
  	if(isset($_POST['login-form-submit']))
    {
        GLOBAL $conn;
        $username = $_POST['login-form-username'];
        $password = md5($_POST['login-form-password']);

        // Validaet Username
        $sql = "SELECT * FROM tbl_admin WHERE username ='$username'";
        $res = mysqli_query($conn, $sql);
        
        // Count User account
        $count = mysqli_num_rows($res);

        if($count > 0)
        {
          	$row = mysqli_fetch_assoc($res);
          	$pass = $row['password'];
            $role = $row['role'];
          	$id = $row['id'];
          	$fullname = $row['full_name'];

            if($password == $pass && $role == master) 
            {
              $_SESSION['admin_id'] = $id;
              $_SESSION['fullname'] = $fullname;
              $_SESSION['login'] = '<div class="success">Login Success</div>';
              ?>
                <script type="text/javascript">
                  swal ({
                    title: "Logged In",
                    text: "Please wait while redirecting...",
                    type: "success", // success, error, warning
                    timer: 1000,
                    showConfirmButton: false
                  }, function() {
                    window.location.href = "../admin/index.php";
                  });
                </script>
              <?php
            } 
            elseif($password == $pass && $role == admin) 
            {
              $_SESSION['user_id'] = $id;
              $_SESSION['fullname'] = $fullname;
              ?>
                <script type="text/javascript">
                  swal ({
                    title: "Logged In",
                    text: "Please wait while redirecting...",
                    type: "success", // success, error, warning
                    timer: 1000,
                    showConfirmButton: false
                  }, function() {
                    window.location.href = "../user/index.php";
                  });
                </script>
              <?php
            }
            else {
              ?>
                <script type="text/javascript">
                  swal ({
                    title: "Incorrect Password",
                    text: "Please retype your password",
                    type: "warning", // success, error, warning
                    timer: 1000,
                    showConfirmButton: false
                  }, function() {
                    window.location.href = "";
                  });
                </script>
              <?php
            }
    
        }
        else
        {
          	$_SESSION['login'] = '<div class="error text-center">Invalid Account</div>';
          	header("location:login.php");
        }
    }
}

// Category Function Start

function add_category()
{
  	if(isset($_POST['submit']))
  	{

    	GLOBAL $conn;
    	$title = htmlentities($_POST['title']);

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

        // Check image

        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

                //   Upload Image only if selected
            if($image_name != "")
            {

                $extension = end(explode('.', $image_name));
                $image_name = "Food_Category_".rand(000, 999).'.'.$extension;


                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../images/category/".$image_name;

                // Upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                // check wether image uploaded or not
                if($upload == FALSE)
                {
                    $_SESSION['upload'] = '<div class="error">Failed to upload Image</div>';
  
                    ?>  
                        <script>
                          windows.location.href="add-category.php";
                        </script>
                    <?php
                    // Stop Process
                    die();
                }
            }
        }
        else
        {
            $image_name = "";
        }

        $sql = "INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'";
            
        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {
            $_SESSION['add'] = '<div class="success">Category Added Successfully</div>';
            ?>
                <script>
                  windows.location.href="manage-category.php";
                </script>
            <?php
        }
        else
        {
            $_SESSION['add'] = '<div class="error">Failed to Add Category</div>';
            header("location:add-category.php");
        }
  	}
}

function update_category()
{
	if(isset($_POST['submit']))
	{
		GLOBAL $conn;
		$id = $_POST['id'];
		$title = $_POST['title'];
		$current_image = $_POST['current_image'];
		$featured = $_POST['featured'];
		$active = $_POST['active'];

		// Checked if Image is selected
		if(isset($_FILES['image']['name']))
		{
			$image_name = $_FILES['image']['name'];

			if($image_name != "")
			{
				// Upload New Image
				$extension = end(explode('.', $image_name));
				$image_name = "Food_Category_".rand(000, 999).'.'.$extension;


				$source_path = $_FILES['image']['tmp_name'];
				$destination_path = "../../images/category/".$image_name;

				// Upload the image
				$upload = move_uploaded_file($source_path, $destination_path);

				// check wether image uploaded or not
				if($upload == FALSE)
				{
					$_SESSION['upload'] = '<div class="error">Failed to upload Image</div>';
          ?>
              <script>
                windows.location.href="manage-category.php";
              </script>
          <?php
					// Stop Process
					die();
				}
				// Remove Current Image if Available
				if($current_image != "")
				{
					$remove_image_path = "../../images/category/".$current_image;
					$remove = unlink($remove_image_path);

					// check if Current Image is removed
					if($remove == FALSE)
					{
						$_SESSION['failed-remove'] = '<div class="error">Failed to Remove Current Image</div>';
            ?>
                <script>
                  windows.location.href="manage-category.php";
                </script>
            <?php
						die();
					}
				}
				  
			}
			else
			{
				$image_name = $current_image;
			}
		}
		else
		{
			$image_name = $current_image;
		}

		$sql = "UPDATE tbl_category SET 
			title = '$title',
			image_name = '$image_name',
			featured = '$featured',   
			active = '$active'
			WHERE id=$id";
		   
		   	$res = mysqli_query($conn, $sql);

		   	if($res == TRUE)
		   	{
				$_SESSION['update'] = '<div class="success">Category Succesfully Updated</div>';
          ?>
              <script>
                windows.location.href="manage-category.php";
              </script>
          <?php
		   	}
		   	else
		   	{
			  $_SESSION['update'] = '<div class="error">Failed to Update category</div>';
			  header('location:manage-category.php');
		   	}
	}
}

function delete_category()
{
	if(isset($_POST['delete']))
	{
		GLOBAl $conn;
		$id = $_POST['id'];
    	$image_name = $_POST['image_name'];

    	// Remove image file if available
    	if($image_name != "")
    	{
      		$path = "../../images/category/".$image_name;
      		$remove = unlink($path);

      		if($remove == FALSE)
      		{
        		$_SESSION['remove'] = "<div class='error'>Failed to remove Category Image</div>";
      		}
    	}

    	$sql = "DELETE FROM tbl_category WHERE id=$id";
    	$res = mysqli_query($conn, $sql);

    	if($res == TRUE)
    	{
      		$_SESSION['delete'] = '<div class="success">Category Deleted Successfully</div>';
    	}
    	else
   		{
      		$_SESSION['delete'] = '<div class="error">Category Failed to Delete Successfully</div>';
    	}

	}
}
// Category Function Ends



// Food Function Starts

function update_food()
{
  	if(isset($_POST['submit']))
  	{
		GLOBAL $conn;
		$id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // Checked if Image is selected
        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];

            if($image_name != "")
            {
            	// Upload New Image
                $extension = end(explode('.', $image_name));
                $image_name = "Food-Name".rand(000, 999).'.'.$extension;
    
    
                $source_path = $_FILES['image']['tmp_name'];
                $destination = "../../images/food/".$image_name;
    
                // Upload the image
                $upload = move_uploaded_file($source_path, $destination);
    
                // check wether image uploaded or not
                if($upload == FALSE)
                {
                    $_SESSION['upload-image'] = '<div class="error">Failed to upload Image</div>';
              
                    ?>
                      <script>window.location.href="manage-food.php";</script>
                    <?php
                    // Stop Process
                    die();
                }

                // Remove Current Image if Available
                if($current_image != "")
                {
                    $remove_image_path = "../../images/food/".$current_image;
                    $remove = unlink($remove_image_path);
    
                    // check if Current Image is removed
                    if($remove == FALSE)
                    {
                        $_SESSION['remove-image'] = '<div class="error">Failed to Remove Current Image</div>';
                        ?>
                        <script>window.location.href="manage-food.php";</script>
                      <?php
                        die();
                    }
                }
                        
            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }

        $sql = "UPDATE tbl_food SET 
                	title = '$title',
                  	description = '$description',
                  	price = $price,
                  	image_name = '$image_name',
                  	category_id = $category,
                  	featured = '$featured',   
                  	active = '$active'
                  	WHERE id=$id";
                 
        $res = mysqli_query($conn, $sql);

        if($res == TRUE)
        {
            $_SESSION['update'] = '<div class="success">Food Updated Succesfully</div>';
            ?>
            <script>window.location.href="manage-food.php";</script>
          <?php
        }
        else
        {
            $_SESSION['update'] = '<div class="error">Failed to Update Food</div>';
            ?>
            <script>window.location.href="manage-food.php";</script>
          <?php
        }
  	}
}

function delete_food()
{
	if(isset($_POST['submit']))
	{
		GLOBAL $conn;
		$id = $_POST['id'];
		$image_name = $_POST['image_name'];
  
		// Remove image file if available
		if($image_name != "")
		{
		  	$path = "../../images/food/".$image_name;
		  	$remove = unlink($path);
  
		  	if($remove == FALSE)
		  	{
				$_SESSION['remove'] = "<div class='error'>Failed to remove Food Image</div>";
				die();
		  	}
		}
  
		$sql = "DELETE FROM tbl_food WHERE id=$id";
		$res = mysqli_query($conn, $sql);
  
		if($res == TRUE)
		{
		  	$_SESSION['delete'] = '<div class="success">Food Deleted Successfully</div>';
		}
		else
		{
		  	$_SESSION['delete'] = '<div class="error">Food Failed to Delete Successfully</div>';
		}

	}
}


// Order Function Start

function update_order()
{
	if(isset($_POST['submit']))
  	{
		GLOBAL $conn;
    	$id = $_POST['id'];
    	$price = $_POST['price'];
    	$qty = $_POST['qty'];
            
    	$total = $price * $qty;

    	$status = $_POST['status'];
    	$customer_name = $_POST['customer_name'];
    	$customer_contact = $_POST['customer_contact'];
    	$customer_email = $_POST['customer_email'];
    	$customer_address = $_POST['customer_address'];

    	$sql = "UPDATE tbl_order SET
    	qty = $qty,
    	total = $total,
    	status = '$status',
    	customer_name ='$customer_name',
    	customer_contact = '$customer_contact',
    	customer_email = '$customer_email',
    	customer_address = '$customer_address'
    	WHERE id = $id";
            

    	$res = mysqli_query($conn, $sql);

    	if($res == TRUE)
    	{
      	$_SESSION['update'] = '<div class="success">Order Updated Successfully</div>';
      	?>
          <script>
            window.location.href="manage-order.php";
          </script>
        <?php
    	}
    	else
    	{
      		$_SESSION['update'] = '<div class="error">Failed to  Updated Order</div>';
      		?>
          <script>
            window.location.href="manage-order.php";
          </script>
        <?php
    	}
  	}
}

    
?>