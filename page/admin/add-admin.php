<?php
  include 'include/header.php';
?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br>

    <?php 
        if(isset($_SESSION['add']))
        {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
        }
    ?>

    <br>

    <form action=""method="POST">

        <table class="tbl-30">
          <tr>
            <td>Full Name: </td>
            <td><input type="text" name="full_name" placeholder="Enter your Name" required></td>
          </tr>

          <tr>
            <td>Username: </td>
            <td><input type="text" name="username" placeholder="Enter your Username" required></td>
          </tr>

          <tr>
            <td>Password: </td>
            <td><input type="password" name="password" placeholder="Enter your password" required></td>
          </tr>

          <tr>
            <td class="2">
              <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
            </td>
          </tr>
        </table>

    </form>
  </div>
</div>

<?php
  add_user();
  include 'include/footer.php';
?>

<?php

    // Process the value from the form and submit it in database
    // Check where the button is clicked or not

    // if(isset($_POST['submit']))
    // {
      // Button Clicked

      // Get the data from form
      // $full_name = $_POST['full_name'];
      // $username = $_POST['username'];
      // $password = md5($_POST['password']); //Password Encryption

      // // SQL query
      // $sql = "INSERT INTO tbl_admin SET 
      //     full_name ='$full_name',
      //     username = '$username',
      //     password = '$password'
      // ";

      // $res = mysqli_query($conn, $sql) or die(mysqli_error());

      // if($res == TRUE)
      // {
      //   $_SESSION['add'] = "<div class='success'>Admin Added Succesfully</div>";
      //   header("location: manage-admin.php");
      // }
      // else{
      //   $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
      //   header("location: add-admin.php");
      // }
    //}
?>