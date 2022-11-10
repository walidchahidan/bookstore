<?php
    $title = "Login";
    if (isset($_SESSION["user"])) {
            header('location:/bookstore/home');
    }
ob_start();
?>
<main class="form-signin mt-5 w-50 m-auto">

    <?php if (isset($_SESSION["error"])): ?>
    <div class="alert alert-danger">
        <?=$_SESSION["error"]?>
    </div>
    <?php endif; ?>

    <form method="POST" action="/bookstore/auth/login">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating my-2">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating my-2">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Log in</button>

    </form>
</main>

<?php
$content = ob_get_clean();
unset($_SESSION["error"]);

require "views/templates/userLayout.php";
?>