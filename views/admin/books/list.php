<?php
    $title = "Books";
ob_start();
?>
<main class=" ms-sm-auto ">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                <a href="<?=$GLOBALS['baseUrl']?>/admin/addbookpage" class="btn btn-sm btn-outline-info fs-5"> <i
                        class='bx bx-list-plus '></i> Add new Book</a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-calendar align-text-bottom" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                This week
            </button>
        </div>
    </div>

    <?php if (isset($_SESSION["success"])): ?>
    <div class="alert alert-success">
        <?=$_SESSION["success"]?>
    </div>
    <?php endif; ?>

    <?php if (isset($_SESSION["error"])): ?>
    <div class="alert alert-danger">
        <?=$_SESSION["error"]?>
    </div>
    <?php endif; ?>

    <h2>Book List</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Edition Date</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($bookList as $book):?>
                <tr>
                    <td><?=$book['id']?></td>
                    <td><?=$book['title']?></td>
                    <td><?=$book['description']?></td>
                    <td><?=$book['author']?></td>
                    <td><?=$book['editionDate']?></td>
                    <td>
                        <?php if(empty($book['picture'])):?>
                        <img src="<?=$GLOBALS['baseUrl']."/uploads/images/default.jpg"?>" alt="Default" width="50px">
                        <?php else : ?>
                        <img src="<?=$GLOBALS['baseUrl']."/".$book['picture']?>" alt="<?=$book['title']?>" width="50px">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?=$GLOBALS['baseUrl']?>/admin/editbookpage/<?=$book['id']?>"
                            class="btn btn-sm btn-success" title="Edit"> <i class="bx bx-pencil"></i></a>
                        <a href="<?=$GLOBALS['baseUrl']?>/admin/deletebook/<?=$book['id']?>"
                            class="btn btn-sm btn-danger" title="Delete"> <i class="bx bx-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</main>

<?php
$content = ob_get_clean();
unset($_SESSION["error"]);
unset($_SESSION["success"]);
require "views/templates/adminLayout.php";
?>