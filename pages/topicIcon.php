<?php
session_start();
ob_start();
require_once "../library/functions.php";
require_once '../assets/Michelf/Markdown.inc.php';
$dbh = connect();

$redirect = false;
if (!isset($_GET["id"])) //If no id is specified in url, we redirect to index page
{
    $redirect = true;
} else {
    $boardId = $_GET["id"];
    $board = getBoardById($boardId);


    if (count($board) != 1)
        $redirect = true; //If array count is different from 1, the board was not found in database
    else
        $board = $board[0]; //Retrieve first element from array and assign it in $topic
}

$page = "topicIcon";
include_once "../includes/header.php";

if (!empty($_POST)) {
    $search = search();
}

//$topics = topics();
$lasttopics = displayLastT();
$lastConnectedUsers = getLastConnectedUsers();
$cats = categoryName($_GET["id"]);
?>

<!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent pt-5">
            <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Board : <?= $board["boardName"]; ?></li>
        </ol>
    </nav>


    <div class="container-lg">

        <div class="row">

            <div class="col-xl-9 themed-grid-col">

                <h4 class="font-weight-light text-black-50 pb-3"> <?= $board["boardName"]; ?> </h4>

                <div class="alert alert-danger border-0 rounded" role="alert">
                    Make sure to read the <a href="#!" class="alert-link">the forum rules</a> before posting.
                </div>

                <div class="board-util d-flex pt-3">
                    <a href="/pages/newTopic.php?id=<?= $boardId ?>">
                        <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn"
                                type="submit">New topic <i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <!-- searchbar -->
                    <div class="bg-light rounded rounded-pill border w-25 ml-3">
                        <div class="input-group">

                            <form method="post" action="">
                                <input type="text" placeholder="Search this forum..." name="query"
                                       aria-describedby="button-addon1"
                                       class="form-control  bg-light rounded rounded-pill border-0">

                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit"
                                            class="btn btn-link text-primary border-right">
                                        <i class="fa fa-search magnifying-glass"></i></button>

                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                                class="fas fa-cog cog"></i></button>
                                </div>
                            </form>

                        </div>
                    </div>


                    <?php
                    $countTopics = countTopics($_GET["id"]);
                    foreach ($countTopics as $count) :
                        ?>

                        <p class="ml-auto font-weight-normal greytext pt-2"> <?= $count["nbrOfTopics"]; ?> topics · Page
                            <strong>1</strong> of <strong>1</strong></p>

                    <?php
                    endforeach;
                    ?>

                    <!-- /searchbar -->
                </div>

                <!-- topics -->

                <div class="card mt-5 border-0">
                    <div class="grad text-white row no-gutters align-items-center w-100">
                        <div class="col"><h4 class="font-weight-light">Topics</h4></div>
                        <div class="d-none d-md-block col-6 text-muted">
                            <div class="row no-gutters align-items-center text-white">
                                <div class="col-3"><i class="fas fa-comments"></i></div>
                                <div class="col-3"><i class="fas fa-eye"></i></div>
                                <div class="col-6"><i class="fas fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <div class="forumslist shadow-sm bg-white mt-1 p-3">


                            <!-- sujet -->
                            <?php
                            if (isset($_POST['query'])) :
                                ?>

                                <h4><?= $search[0]['countSearch'] ?> résultats trouvés pour la recherche
                                    "<?= $_POST['query'] ?>" :</h4>

                                <?php
                                foreach ($search as $result) :
                                    $userName = topicsName($result['topicBy']);
                                    [$lastUserName, $lastDate] = topicsLastMsg($result['topicId']);
                                    $countPosts = countPostsOnTopic($result['topicId']);
                                    ?>
                                    <div class="row no-gutters py-3 text-black-50 align-items-center">
                                        <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i>
                                        </div>
                                        <div class="col"><a
                                                    href="/pages/topicRead.php?id=<?= $result['topicId']; ?>"> <?= getMarkdown($result['topicSubject']); ?></a>

                                            <p class="text-secondary small">by <a href="#"><?= $userName; ?></a></p>
                                        </div>

                                        <div class="d-none d-md-block col-6">
                                            <div class="row no-gutters pl-2 align-items-center">
                                                <div class="col-3"><?= $countPosts['countPosts']; ?> </div>
                                                <div class="col-3">327</div>
                                                <div class="media col-6 align-items-center">
                                                    <p>by <a href="#"><?= $lastUserName; ?></a> <a href="#"><i
                                                                    class="fas fa-external-link-alt"></i></a>
                                                        <span class="d-block"><?= $lastDate; ?></span></p></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>

                            <?php
                            else :
                                ?>

                                <?php
                                if ($_GET['id'] == 8) {
                                    $topics = topicsRandom();
                                } else {
                                    $topics = topics();
                                }
                                foreach ($topics as $topic) :
                                    $userName = topicsName($topic['topicBy']);
                                    [$lastUserName, $lastDate] = topicsLastMsg($topic['topicId']);
                                    //$postTopic = countPosts($topic['postId']);
                                    $countPosts = countPostsOnTopic($topic['topicId']);
                                    ?>
                                    <div class="row no-gutters py-3 text-black-50 align-items-center">
                                        <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i>
                                        </div>
                                        <div class="col"><a
                                                    href="/pages/topicRead.php?id=<?= $topic['topicId']; ?>"> <?= getMarkdown($topic['topicSubject']); ?></a>

                                            <p class="text-secondary small">by <a href="#"><?= $userName; ?></a></p>
                                        </div>

                                        <div class="d-none d-md-block col-6">
                                            <div class="row no-gutters pl-2 align-items-center">
                                                <div class="col-3"><?= $countPosts['countPosts']; ?> </div>
                                                <div class="col-3">327</div>
                                                <div class="media col-6 align-items-center">
                                                    <p>by <a href="#"><?= $lastUserName; ?></a> <a href="#"><i
                                                                    class="fas fa-external-link-alt"></i></a>
                                                        <span class="d-block"><?= $lastDate; ?></span></p></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                ?>

                            <?php
                            endif;
                            ?>

                            <!-- /sujet -->

                        </div>
                    </div>
                </div>

                <!-- /topics -->

                <div class="board-util d-flex pt-3">
                    <a href="/pages/newTopic.php?id=<?= $boardId ?>">
                        <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn"
                                type="submit">New topic <i class="fas fa-pencil-alt"></i></button>
                    </a>
                    <!-- searchbar -->
                    <div class="dropdown">
                        <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
                                type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort-amount-down-alt text-black-50"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Most recent to oldest</a>
                            <a class="dropdown-item" href="#!">Oldest to most recent</a>
                            <a class="dropdown-item" href="#!">Publication date</a>
                            <a class="dropdown-item" href="#!">Most popular</a>
                            <a class="dropdown-item" href="#!">Author</a>
                        </div>
                    </div>
                    <?php
                    $countTopics = countTopics($_GET["id"]);
                    foreach ($countTopics as $count) :
                        ?>

                        <p class="ml-auto font-weight-normal greytext pt-2"> <?= $count["nbrOfTopics"]; ?> topics · Page
                            <strong>1</strong> of <strong>1</strong></p>

                    <?php
                    endforeach;
                    ?>
                    <!-- /searchbar -->
                </div>

                <div class="board-util d-flex pt-3">
                    <a href="/index.php">Return to Board Index</a>

                    <div class="dropdown ml-auto">
                        <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle text-black-50"
                                type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Jump to
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!">Anne</a>
                            <a class="dropdown-item" href="#!">Caroline</a>
                            <a class="dropdown-item" href="#!">Bastien</a>
                            <a class="dropdown-item" href="#!">Auban</a>
                            <a class="dropdown-item" href="#!">Sandrine</a>
                            <a class="dropdown-item" href="#!">Forum</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start of right side -->
            <?php include_once "../includes/sidebar.php" ?>
            <!-- end container-lg -->
        </div>
    </div>
</div>


<?php
$countTopics = countTopics($_GET["id"]);
foreach ($countTopics as $count) :
    ?>

    <p class="ml-auto font-weight-normal greytext pt-2"> <?= $count["nbrOfTopics"]; ?> topics · Page <strong>1</strong>
        of <strong>1</strong></p>

<?php
endforeach;
?>

<!-- /searchbar -->
</div>

<!-- topics -->

<div class="card mt-5 border-0">
    <div class="grad text-white row no-gutters align-items-center w-100">
        <div class="col"><h4 class="font-weight-light">Topics</h4></div>
        <div class="d-none d-md-block col-6 text-muted">
            <div class="row no-gutters align-items-center text-white">
                <div class="col-3"><i class="fas fa-comments"></i></div>
                <div class="col-3"><i class="fas fa-eye"></i></div>
                <div class="col-6"><i class="fas fa-clock"></i></div>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="forumslist shadow-sm bg-white mt-1 p-3">


            <!-- sujet -->

            <?php
            if ($_GET['id'] == 8) {
                $topics = topicsRandom();
            } else {
                $topics = topics();
            }
            foreach ($topics as $topic) :
                $userName = topicsName($topic['topicBy']);
                [$lastUserName, $lastDate] = topicsLastMsg($topic['topicId']);
                //$postTopic = countPosts($topic['postId']);
                $countPosts = countPostsOnTopic($topic['topicId']);
                ?>
                <div class="row no-gutters py-3 text-black-50 align-items-center">
                    <div class="col-1 text-center"><i class="fas fa-check forumslist__green"></i></div>
                    <div class="col"><a
                                href="/pages/topicRead.php?id=<?php echo $topic['topicId']; ?>"> <?= getMarkdown($topic['topicSubject']); ?></a>

                        <p class="text-secondary small">by <a href="#"><?= $userName; ?></a></p></div>

                    <div class="d-none d-md-block col-6">
                        <div class="row no-gutters pl-2 align-items-center">
                            <div class="col-3"><?= $countPosts['countPosts']; //var_dump($countPosts);  ?> </div>
                            <div id="countVisitor" class="col-3"><?= $topic['topicCountViews']; ?></div>
                            <div class="media col-6 align-items-center">
                                <p>by <a href="#"><?= $lastUserName; ?></a> <a href="#"><i
                                                class="fas fa-external-link-alt"></i></a>
                                    <span class="d-block"><?= $lastDate; ?></span></p></div>
                        </div>
                    </div>
                </div>


            <?php
            endforeach;
            ?>
            <!-- /sujet -->

        </div>
    </div>
</div>

<!-- /topics -->

<div class="board-util d-flex pt-3">
    <a href="/pages/newTopic.php?id=<?= $boardId ?>">
        <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">New topic
            <i class="fas fa-pencil-alt"></i></button>
    </a>
    <!-- searchbar -->
    <div class="dropdown">
        <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
                type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-sort-amount-down-alt text-black-50"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="#!">Most recent to oldest</a>
            <a class="dropdown-item" href="#!">Oldest to most recent</a>
            <a class="dropdown-item" href="#!">Publication date</a>
            <a class="dropdown-item" href="#!">Most popular</a>
            <a class="dropdown-item" href="#!">Author</a>
        </div>
    </div>
    <?php
    $countTopics = countTopics($_GET["id"]);
    foreach ($countTopics as $count) :
        ?>

        <p class="ml-auto font-weight-normal greytext pt-2"> <?= $count["nbrOfTopics"]; ?> topics · Page
            <strong>1</strong> of <strong>1</strong></p>

    <?php
    endforeach;
    ?>
    <!-- /searchbar -->
</div>

<div class="board-util d-flex pt-3">
    <a href="/index.php">Return to Board Index</a>

    <div class="dropdown ml-auto">
        <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle text-black-50"
                type="button" id="dropdownMenu1" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Jump to
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="#!">Anne</a>
            <a class="dropdown-item" href="#!">Caroline</a>
            <a class="dropdown-item" href="#!">Bastien</a>
            <a class="dropdown-item" href="#!">Auban</a>
            <a class="dropdown-item" href="#!">Sandrine</a>
            <a class="dropdown-item" href="#!">Forum</a>
        </div>
    </div>
</div>

</div>

<!-- start of right side -->
<?php include_once "../includes/sidebar.php" ?>
<!-- end container-lg -->
</div>
</div>
</div>
</div>
<?php include_once "../includes/footer.php" ?>

