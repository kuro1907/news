<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php
    // destroy the session
    session_destroy();
    header('location:../../index.php');
    ?>

</body>

</html>