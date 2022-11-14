<?php
$title = "single book";
ob_start();

?>

<h1>Hello</h1>
<img width="600px" src="<?= $GLOBALS['baseUrl'] . "/" . $singlebook['picture'] ?>" alt="<?= $singlebook["title"] ?>">
<h2>Title: <?= $singlebook["title"] ?></h2>
<p>Description: <?= $singlebook["description"] ?></p>
<p>Author: <?= $singlebook["author"] ?></p>
<p>Edition Date: <?= $singlebook["editionDate"] ?></p>

<?php
$content = ob_get_clean();
require "views/templates/userLayout.php";
?>