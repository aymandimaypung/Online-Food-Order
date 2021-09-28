<?php
unset($_SESSION['admin_id']);
    session_destroy();

    ?>
        <script>
            window.location.href="../guest/login.php";
        </script>
    <?php
?>