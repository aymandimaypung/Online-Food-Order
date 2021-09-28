<?php 
  include 'include/header.php'; 
?>
<br><br><br><br><br>

      <?php
          if(isset($_SESSION['add']))
          {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }

          if(isset($_SESSION['delete']))
          {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

          if(isset($_SESSION['user-not-found']))
          {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
          }

          if(isset($_SESSION['pwd-not-match']))
          {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
          }

          if(isset($_SESSION['change-pwd']))
          {
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
          }
      ?>


  <div class="container clearfix">
        <!-- Buttton to Add Admin -->
        <a href="add-admin.php" class="btn-primary btn-xs">Add Admin</a>
        <br><br>

					<div class="table-responsive">

						<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>S.N.</th>
									<th>Full name</th>
									<th>Username</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>S.N.</th>
									<th>Full name</th>
									<th>Username</th>
									<th>Action</th>
								</tr>
							</tfoot>
                <?php
                  $sql = "SELECT * FROM tbl_admin";
                  $res = mysqli_query($conn, $sql);

                  if($res == TRUE)
                  {
                    $count = mysqli_num_rows($res);
                    $num = 1;

                    if($count > 0)
                    {
                      while($row = mysqli_fetch_assoc($res))
                      {
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $username = $row['username']

                        ?>
                          <tbody>
                            <tr>
                              <td><?= $num++; ?></td>
                              <td><?= $full_name;?></td>
                              <td><?= $username;?></td>
                              <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?=$id;?>">
                                    <a href="update-password.php?id=<?= $id;?>" class="btn-primary btn-xs">Change Password</a>
                                    <a href="update-admin.php?id=<?= $id;?>" class="btn-secondary btn-xs">Update Admin</a>
                                    <input type="submit" name="delete" class="btn-danger btn-xs" value="DELETE">  
                                </form>
                              </td>
                            </tr>
                          </tbody>
                        <?php
                      }
                    }
                    else
                    {

                    }
                  }
                ?>
            </table>
          </div>
    </div>

<?php
  include 'include/footer.php';
  delete_user();
?>