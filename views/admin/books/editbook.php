<?php
$title = "Edit Book";

ob_start();
?>
<main class="form-signin mt-5 w-50 m-auto">
    <?php if (isset($_SESSION["error"])): ?>
    <div class="alert alert-danger">
        <?=$_SESSION["error"]?>
    </div>
    <?php endif; ?>
    <form action="<?=$GLOBALS['baseUrl']?>/admin/updateBook" method="POST" enctype="multipart/form-data">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Edit Book</h1>

        <input type="hidden" name="id" value="<?= $newbook["id"]?>">
        <input type="hidden" name="oldPicture" value="<?= $newbook["picture"]?>">
        <input type="hidden" name="oldFilePath" value="<?= $newbook["filePath"]?>">
        <div class="form-floating my-2">
            <input type="text" name="title" value="<?= $newbook["title"]?>" class="form-control" id="floatingInput"
                placeholder="Title">
            <label for="floatingInput">Tilte</label>
        </div>
        <div class="form-floating my-2">
            <input type="text" name="author" value="<?= $newbook["author"]?> " class="form-control" id="floatingInput"
                placeholder="author">
            <label for="floatingInput">Author Name</label>
        </div>
        <div class="form-floating my-2">
            <input type="text" name="description" value="<?= $newbook["description"]?> " class="form-control"
                id="floatingInput" placeholder="Description">
            <label for="floatingInput">Description</label>
        </div>
        <div class="form-floating my-2">
            <input type="date" name="date" value="<?= $newbook["editionDate"]?>" class="form-control"
                id="floatingPassword" placeholder="date">
            <label for="floatingPassword">Edition Date</label>
        </div>

        <div class="form-floating my-2">
            <input type="file" name="picture" class="form-control" id="floatingPassword"
                placeholder="Select Your picture">
            <label for="floatingPassword">Book Picture</label>
        </div>
        <div class="form-floating my-2">
            <input type="file" name="filePath" class="form-control" id="floatingPassword"
                placeholder="Select Your Book">
            <label for="floatingPassword">File Path</label>
        </div>
        <button class="w-100 btn btn-lg btn-success" type="submit" name="edit">Edit Book</button>

    </form>
</main>

<?php
$content = ob_get_clean();

require "views/templates/adminLayout.php";
?>