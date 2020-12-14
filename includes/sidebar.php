<?php

if (!empty($_POST) && isset($_POST['username'])) {
    $erreur = connexion();
}
if (isset($_POST["search"])) {
    header('location: ../pages/topicIcon.php?id=1&search=' . $_POST['search']);
}

?>

<div class="col-xl-3 themed-grid-col">
    <!-- searchbar -->
    <div class="bg-light rounded rounded-pill border mt-5">
    <form method="post" action="">
        <div class="input-group">
   
                <input type="search" name="search" placeholder="Search..." aria-describedby="button-addon1"
                       class="form-control  bg-light rounded rounded-pill border-0">
                <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                class="fa fa-search magnifying-glass"></i></button>
                </div>
         
        </div>
        </form>
    </div>
    <!-- /searchbar -->
    <hr class="mb-4">
    <!-- login - register card -->
    <?php
    if (isset($_SESSION["user"])) :
        ?>

        <div id="accordionGroup">
            <button type="button"
                    class="btn bg-transparent font-weight-bold text-black-50 btn-block mb-2 text-left accordion-btn"
                    data-toggle="collapse" data-target="#demo"> Welcome <?php $infos = infos();
                echo $infos["userNname"]; ?> </button>
            <div id="demo" class="collapse show" data-parent="#accordionGroup">
                <div class="card-body">

                    <a class="nav-item nav-link active mx-3" href="/pages/profile.php"><i
                                class="far fa-id-card"></i> Change your profile</a>

                    <a class="nav-item nav-link mx-3" href="/pages/logout.php"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>

    <?php
    else :
        ?>
        <div id="accordionGroup">
            <button type="button"
                    class="btn bg-transparent font-weight-bold text-black-50 btn-block mb-2 text-left accordion-btn"
                    data-toggle="collapse" data-target="#demo">Login · Register
            </button>
            <div id="demo" class="collapse show" data-parent="#accordionGroup">
                <div class="card-body">

                    <form method="post" action="">
                        <div class="form-group">
                            <label class="greytext">Username</label>
                            <input type="username" class="form-control bg-light rounded rounded-pill"
                                   placeholder="Username" name="username"
                                   value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <label class="greytext">Password</label>
                            <input type="password" class="form-control bg-light rounded rounded-pill"
                                   placeholder="******" name="password"
                                   value="<?php if (isset($_POST["password"])) echo $_POST["password"] ?>">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <div class="checkbox">
                                <label class="greytext"> <input type="checkbox"> Save password </label>
                            </div> <!-- checkbox .// -->
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn text-white btn-login btn-block rounded rounded-pill">
                                Login
                            </button>
                        </div> <!-- form-group// -->
                    </form>


                </div>
            </div>
        </div>
        <p class="p-1"><a href="#">I forgot my password</a></p>
    <?php
    endif;
    ?>
    <!-- /login - register card -->

    <!-- last posts -->
    <div class="card border-0 mt-5">
        <div class="grad mw-100">
            <h4 class="text-white font-weight-normal">Last topics</h4>
        </div>
        <div class="bg-light p-3 last-posts">
            <?php

            foreach ($lasttopics as $lasttopic) :

                ?>
                <div class="last-posts__desc">
                    <div class="card-text rounded bg-white mt-3 p-3"><h5>
                            <?= $lasttopic["topicSubject"]; ?>
                            <span class="float-right font-weight-normal pt-1"><?= $timeago = getTimeAgo(strtotime($lasttopic['topicDateUpdate']));

                                $lasttopic["topicDateUpdate"]; ?></span></h5>
                        <?php
                        $lastposts = displayPosts($lasttopic["topicId"]);
                        foreach ($lastposts

                        as $lastpost) :

                        ?>
                            <p class="desc"><?= $lastpost["postContent"]; ?></p>
                            <small><a class="font-weight-bold text-uppercase" target="_blank" href="/pages/topicRead.php?id=<?= $lasttopic['topicId']; ?>"><i class="fas fa-mug-hot"></i> open topic</a></small>
                            <?php

                            endforeach;
                            ?>

                    </div>
                </div>
            <?php

            endforeach;

            ?>
        </div>


    </div>

    <!-- /last posts -->

    <!-- last active users -->
    <div class="card border-0 mt-5">
        <div class="grad mw-100">
            <h4 class="text-white font-weight-normal">Last active users</h4>
        </div>
        <div class="card-body bg-light last-users">

            <div class="d-flex flex-row">

                <?php

                foreach ($lastConnectedUsers as $lastConnectedUser) : //boucle element & l'element

                    ?>

                    <div class="card rounded border-0 w-100 m-1 pd-1">
                        <div class="card-body text-center sidebarpic">

                        <img class="rounded-circle" src="
                        <?php
                        if (!empty($lastConnectedUser["userImage"])) {
                                echo "data:image/jpeg;base64," . $lastConnectedUser['userImage'] ;
                        }
                        else {
                            echo "https://www.gravatar.com/avatar/".md5(strtolower(trim($lastConnectedUser['userEmail'])))."?"."&s=80";
                        }
                        ?>">

                            <p class="pt-2 pb-2"><span> <?= $lastConnectedUser["userNname"]; ?></span></p>

                            <p class="small"><?= $lastConnectedUser["userMood"]; ?>
                            </p>

                        </div>
                    </div>
                <?php
                endforeach;
                ?>

            </div>


        </div>
    </div>
    <!-- /last active users -->


</div>
