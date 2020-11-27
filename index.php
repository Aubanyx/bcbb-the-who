<?php
session_start();
require_once "./library/functions.php";
$dbh = connect();
$categories = displayCategories();
$lasttopics = displayLastT();
$page = "Home";

include_once "./includes/header.php";
?>

<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Board Index</li>
        </ol>
    </nav>

    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-9 themed-grid-col">
                <?php
                foreach ($categories as $cats) :
                    $boards = displayBoards($cats["categoryId"]);

                    ?>
                    <h1><?= $cats["categoryName"]; ?></h1>

                    <div class="row bg-light forums__list">
                        <!-- board -->
                        <?php

                        foreach ($boards as $board) :

                            ?>
                            <div class="col-6 col-sm-4">
                                <div class="card border-0 shadow-sm card__cat">
                                    <div class="card-body">
                                        <img src="assets/images/icons-coffee/<?= $board['boardImage']; ?>"
                                             class="float-left"/>
                                        <h4 class="card-title"><a href="https://bcbb-thewho.herokuapp.com/pages/topicIcon.php"><?= $board["boardName"]; ?></a></h4>
                                        <p class="card-text"><?= $board["boardDescription"]; ?>. </p>
                                        <hr class="mb-4">
                                        <!--Table-->
                                        <table class="h-25">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <p>
                                                        <span>300</span>
                                                    </p>
                                                </th>
                                                <th><p>
                                                    <p><span>267</span></p></p></th>
                                                <th><p>
                                                    <p><span>Tue Nov 24</span></p></p></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><p>Topics</p></td>
                                                <td><p>Posts</p></td>
                                                <td><p>Last Post</p></td>
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

