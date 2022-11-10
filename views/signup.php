<?php
$title = "Sign Up";

ob_start();
?>
<main class="form-signin mt-5 w-50 m-auto">
    <form action="/bookstore/auth/signup" method="POST" enctype="multipart/form-data">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating my-2">
            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nom Prenom">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating my-2">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating my-2">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating my-2">
            <input type="file" name="picture" class="form-control" id="floatingPassword"
                placeholder="Select Your picture">
            <label for="floatingPassword">Profile Picture</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup">Sign up</button>

    </form>
</main>

<?php
$content = ob_get_clean();

require "views/templates/userLayout.php";
?>