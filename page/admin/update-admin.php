<?php
    include 'include/header.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_admin WHERE id=$id";
          $res = mysqli_query($conn, $sql);

          if($res == TRUE)
          {
            $count = mysqli_num_rows($res);

            if($count == 1)
            {
              $row = mysqli_fetch_assoc($res);

              $full_name = $row['full_name'];
              $username = $row['username'];
            }
            else
            {
              header("location: manage-admin.php");
            }
          }
        ?>

        <form action="" method="Post">

          <table class="tbl-30">
            <tr>
              <td>Full Name: </td>
              <td><input type="text" name="full_name" value="<?= $full_name;?>" required></td>
            </tr>

            <tr>
              <td>Username: </td>
              <td><input type="text" name="username" value="<?= $username;?>" required></td>
            </tr>

            <tr>
              <td class="2">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <input type="submit" name="update" value="Update Admin" class="btn-secondary">
              </td>
            </tr>
          </table>

        </form>

    </div>
</div>

<?php
    include 'include/footer.php';
    update_user();
?>