<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <title><?=$title?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container">
                <a class="navbar-brand" href="<?=$GLOBALS['baseUrl']?>/home">Book Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>


                        <?php if (isset($_SESSION["user"])): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=$GLOBALS['baseUrl']?>/auth/loginpage"><?=$_SESSION["user"]['name']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$GLOBALS['baseUrl']?>/auth/logout">Logout</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$GLOBALS['baseUrl']?>/auth/signuppage">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$GLOBALS['baseUrl']?>/home/getcard">book</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=$GLOBALS['baseUrl']?>/auth/loginpage">Login</a>
                        </li>
                        <?php endif; ?>

                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <?=$content?>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>