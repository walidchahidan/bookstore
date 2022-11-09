<?php
    $title = "Admin|Home";

ob_start();
?>

<h1>Admin page</h1>

<?php
$content = ob_get_clean();

require "views/templates/adminLayout.php";
?>