<?php
session_start();
ob_start();
require_once "./library/functions.php";
require_once './assets/Michelf/Markdown.inc.php';
$dbh = connect();
$categories = displayCategories();
$lasttopics = displayLastT();
$lastConnectedUsers = getLastConnectedUsers();
$page = "Home";
if($_SERVER['REQUEST_URI'] == "/index.php?mdp=Crack") {
    header("Location: ./pages/topicIcon.php?id=10");
}

include_once "./includes/header.php";
?>

<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
        </ol>
    </nav>

    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-9 themed-grid-col">
                <?php
                foreach($categories as $cats) :
                    $boards = displayBoards($cats["categoryId"]);

                    ?>
                <h1><?= $cats["categoryName"]; ?></h1>

                <div class="row bg-light forums__list">
                    <!-- board -->
                    <?php

                    foreach($boards as $board) :

                    ?>
                    <div class="col-6 col-sm-4" id="<?= $board["boardId"]?>">


                        <div class="card border-0 shadow-sm card__cat">


                            <div class="card-body">
                                <img src="assets/images/icons-coffee/<?= $board['boardImage']; ?>" class="float-left mr-5"/>
                               
                               
                                <h4 class="card-title">
                                    <?php if ($board['boardStatus'] == 0) {
                                        echo '<a href="./pages/topicIcon.php?id=' . $board['boardId'] . '">' . $board['boardName'] . '</a>';
                                     } elseif ($board['boardStatus'] == 1) {
                                         echo '<a href="#">' . $board['boardName'] . '</a>';
                                    };
                                    ?>
                                </h4>
                               
                               
                               
                                <p class="card-text"><?= $board["boardDescription"]; ?> </p>
                                <hr class="mb-4">
                                <!--Table-->

                                <table class="h-25">
                                    <thead>
                                    <tr>

                                        <?php
                                        $countTopics=countTopics($board["boardId"]);
                                        foreach($countTopics as $count) :
                                        ?>
                                        <th><p><span><?= $count["nbrOfTopics"]; ?> </span></p></th>
                                          <?php
                                          endforeach;
                                          ?>

                                        <?php
                                        $countPosts=countPosts($board["boardId"]);
                                        foreach($countPosts as $countP) :
                                        ?>
                                        <th><p><p><span><?= $countP["nbrOfPosts"]; ?> </span></p></p></th>
                                        <?php
                                        endforeach;
                                        ?>
                                        <?php
                                        $BoardLastTopics=BoardLastPost($board["boardId"]);
                                        foreach($BoardLastTopics as $boardLP) :
                                        ?>
                                        <th><p class="d-none d-sm-block"><span>
                                                    <a href="/pages/topicRead.php?id=<?= $boardLP['topicId']; ?>"> <i class="fas fa-arrow-alt-circle-right"></i>
                                                    <?php
                                                    $dateSrc = $boardLP['postDate'];
                                                    $dateTime = new DateTime($dateSrc);
                                                    echo date('D M d', strtotime($dateSrc)); ?>
                                                    </a>
                                                   </span></p></th>


                                        <?php
                                        endforeach;
                                        ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><p class="mt-3">Topics</p></td>
                                        <td><p class="mt-3">Posts</p></td>
                                        <td><p class="d-none d-sm-block mt-3">Last Post</p></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Table-->

                        </div>


                    </div>

                        <!-- /board -->
                    </div>
                    <?php

                    endforeach;

                    ?>
                </div>
                <?php
                endforeach;
                ?>


            </div>

            <!-- start of right side -->


            <?php include_once "./includes/sidebar.php" ?>

            <!-- end of row -->
        </div>
        <!-- end container-lg -->
    </div>
    <!-- end main container -->

</div>

<script src="./assets/js/script.js"></script>
<?php include_once "./includes/footer.php" ?>

