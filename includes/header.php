<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bcbb - <?= $page ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/markdown/dist/toastui-editor.css">
    <link rel="stylesheet" href="/assets/markdown/dist/toastui-editor-viewer.css">

    <link href="/bcbb-the-who/assets/fontawesome/css/all.css" rel="stylesheet">
    <link href="/bcbb-the-who/assets/css/style.css" rel="stylesheet">
    <link href="/bcbb-the-who/assets/css/faceMocion.css" rel="stylesheet">
   
</head>
<body class="bg-light">
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light justify-content-end p-5">
        <div class="" id="navbarNavAltMarkup">
            <div class=" h4 navbar-nav">
                <?php
                if (isset($_SESSION["user"])) :
                    $infos = infos();
                    if ($infos["userLevel"] == "2") :
                        ?>
                        <a class="nav-item nav-link text-light mx-3" href="#"><i class="fas fa-user-shield"></i> Admin </a>
                    <?php
                    endif;
                endif;
                ?>
                <a class="nav-item nav-link active text-light mx-3" href="/index.php">
                    <i class="fas fa-home"></i> Home</a>
                <?php
                if (isset($_SESSION["user"])) :
                    ?>
                    <a class="nav-item nav-link active text-light mx-3" href="/pages/profile.php"><i
                                class="far fa-id-card"></i> Profile</a>
                    <p class="nav-item nav-link active text-light mx-3" href="#"><i
                                class="fas fa-user"></i> Welcome <?php $infos = infos();
                        echo $infos["userNname"];?></p>
                    <a class="nav-item nav-link text-light mx-3" href="/pages/logout.php"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                <?php
                else :
                    ?>
                    <a class="nav-item nav-link text-light mx-3" href="/pages/register.php">
                        <i class="far fa-arrow-alt-circle-right"></i> Register</a>
                    <a class="nav-item nav-link text-light mx-3" href="/pages/login.php">
                        <i class="far fa-clipboard"></i> Login</a>
                <?php
                endif;
                ?>

            </div>
        </div>
    </nav>
    <h1 class="text-center titre__Header align-items-center">COFFEE STORIES</h1>
</header>