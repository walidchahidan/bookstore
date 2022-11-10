<?php
    $title = "Home";

ob_start();
?>

<h1>Welcome to user page</h1>

<?php
$content = ob_get_clean();

require "views/templates/userLayout.php";
?>