<?php
$title = "Book user";
ob_start();
?>

<main>
<div class="container text-center m-5">

  <div class="row"><?php foreach($bookList as $book):?>
    <div class="col-md-4 h-100">
      <div class="card" style="width: 18rem;">
         <img src="<?= $GLOBALS['baseUrl']."/".$book['picture']?>" class="card-img-top" alt="<?= $book['title']?>">
          <div class="card-body">
            <h5 class="card-title"><?= $book['title']?></h5>
            <p class="card-text"><?= $book['description']?></p>
            <h6 class="card-text"><?= $book['author']?></h6>
            <a href="<?= $GLOBALS['baseUrl']?>/Home/viewBook/<?=$book['id']?>" class="btn btn-primary"> View</a>
            
          </div>
      </div>
  </div>
  <?php endforeach;?>
</div>
</main>

<?php
$content = ob_get_clean();
unset($_SESSION["error"]);
unset($_SESSION["success"]);

require "views/templates/userLayout.php";
?>
