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





    <nav class="navbar navbar-expand-lg navbar-light justify-content-end p-5 ">
        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
        class="fas fa-bars fa-1x"></i></span></button>
        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent1">
            <div class="w-100 h4 navbar-nav">
            <ul class="navbar-nav mr-auto d-flex justify-content-end w-100">
                <?php
                if (isset($_SESSION["user"])) :
                    $infos = infos();
                    if ($infos["userLevel"] == "2") :
                        ?>
                        <li class="nav-item">
                        <a class="nav-item nav-link text-light mx-3" href="#"><i class="fas fa-user-shield"></i> Admin </a>
                        </li>
                   <?php
                    endif;
                endif;
                ?>
                <li class="nav-item">
                <a class="nav-item nav-link active text-light mx-3" href="/index.php">
                    <i class="fas fa-home"></i> Home</a>
                </li>
              <?php
                if (isset($_SESSION["user"])) :
                    ?>
                 
                 <li class="nav-item">
                    <a class="nav-item nav-link active text-light mx-3" href="/pages/profile.php"><i
                                class="far fa-id-card"></i> Profile</a>
                 </li>
                 <p class="nav-item nav-link active text-light mx-3" href="#"><i
                                class="fas fa-user"></i> Welcome <?php $infos = infos();
                        echo $infos["userNname"];?></p>
                 <li class="nav-item">
                    <a class="nav-item nav-link text-light mx-3" href="/pages/logout.php"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                 </li>
                <?php
                else :
                    ?>
                 <li class="nav-item">
                    <a class="nav-item nav-link text-light mx-3" href="/pages/register.php">
                        <i class="far fa-arrow-alt-circle-right"></i> Register</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-item nav-link text-light mx-3" href="/pages/login.php">
                        <i class="far fa-clipboard"></i> Login</a>
                 </li>
                 </ul>
                <?php
                endif;
                ?>

            </div>
        </a>
    </nav>
    <h1 class="text-center titre__Header align-items-center">COFFEE STORIES</h1>
</header>