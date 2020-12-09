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
    $topicId = $_GET["id"];
    $topic = getTopicById($topicId);


    if (count($topic) != 1)
        $redirect = true; //If array count is different from 1, the topic was not found in database
    else
        $topic = $topic[0]; //Retrieve first element from array and assign it in $topic
}

if ($redirect) {
    header('location: ./');
    exit();
}

$getId = $_GET['id'];
$lasttopics = displayLastT();
$lastConnectedUsers = getLastConnectedUsers();

$boardName=boardName($_GET["id"]);
$cats=categoryName($_GET["id"]);
$posts = getPostsByTopicId($getId);

countViews($_GET["id"]);

$page = "Home";
$url = "http://localhost:8888/";

include_once "../includes/header.php";

?>

    <!-- forum body -->

<!-- pagination-->

    <!-- /pagination -->

    <!-- main container -->
    <div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">
        <nav aria-label="breadcrumb">

        <ol class="breadcrumb bg-transparent pt-5">
                <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="/pages/topicIcon.php?id=<?= $topic['topicBoard'] ?>"></i> Board : <?= $topic['boardName'] ?></a></li> 
                <li class="breadcrumb-item active" aria-current="page">Topic : <?= $topic['topicSubject'] ?></li>     
            </ol>
        </nav>


        <div class="container-lg">

            <div class="row">

                <div class="col-xl-9 themed-grid-col">
                    <h3><?= getMarkdown($topic["topicSubject"]); ?></h3>

            
                 
                    <div class="board-util d-flex pt-3">


                        <!-- LOCK TOPIC BUTTON -->
                        <?php
                        $getId = $_GET['id'];
                        $query = "SELECT topicSubject, topicBy, topicLock FROM topics WHERE topicId = 6";
                        $topicLock = $dbh->prepare($query);
                        $topicLock->execute();
                        $topicLocked = $topicLock->fetch(PDO::FETCH_ASSOC);

                        /*BUTTON SCRIPT*/
                        if(isset($_POST["topicLock"])){
                            $lockQuery = "UPDATE topics SET topicLock = ? WHERE topicId = 6";
                            $lockResult = $dbh->prepare($lockQuery);
                            if($topicLocked["topicLock"]){
                                $topicLock->execute([0,$getId]);
                            }else{
                                $topicLock->execute([1,$getId]);
                            }
                            header("Location: topicRead.php?id=$getId");
                        }

                        if(isset($_SESSION["user"])
                            AND $topicLocked["topicBy"]==$_SESSION["user"]
                            AND !$topicLocked["topicLock"]){
                            ?>
                                <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="button" name="lockTopic">
                                    Lock Topic
                                </button>

                            <?php
                        } elseif(isset($_SESSION["user"])
                            AND $topicLocked["topicBy"]==$_SESSION["user"]
                            AND $topicLocked["topicLock"]){
                            ?>
                                <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="button" name="lockTopic">
                                    Unlock Topic
                                </button>

                            <?php
                        }
                        ?>
                        <!-- / LOCK TOPIC BUTTON -->

                        <a href="/pages/replyTopic.php?id=<?= $topicId ?>">
                            <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn"
                                    type="button">Post reply <i class="fas fa-reply"></i></button>
                        </a>
                        <!-- searchbar -->
                        <div class="dropdown">
                            <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="fas fas fa-wrench text-black-50"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                <a class="dropdown-item" href="#!">Lock topic</a>

                            </div>
                        </div>

                        <div class="bg-light rounded rounded-pill border w-25 ml-3">
                            <div class="input-group">
                                <input type="search" placeholder="Search this topic..." aria-describedby="button-addon1"
                                       class="form-control  bg-light rounded rounded-pill border-0">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit"
                                            class="btn btn-link text-primary border-right"><i
                                                class="fa fa-search magnifying-glass"></i></button>
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                                class="fas fa-cog cog"></i></button>
                                </div>
                            </div>
                        </div>
                        <p class="ml-auto font-weight-normal greytext pt-2"> <?= count($posts) ?> replies · <?php
                            $postsParPage = 10;
                            $getPId = $_GET["id"];
                            $postsTotalReq = $dbh->query("SELECT postDate FROM posts WHERE postTopic = '$getPId'");
                            $postsTotal = $postsTotalReq->rowCount();
                            $pagesTotal = ceil($postsTotal/$postsParPage);

                            if(isset($_GET['page']) && !empty($_GET['page'])){
                                $pageCourante = (int) strip_tags($_GET['page']);
                            }else{
                                $pageCourante = 1;
                            }
                            $depart = ($pageCourante-1)*$postsParPage;

                            for($i=1;$i<=$pagesTotal;$i++) {
                                if($i == $pageCourante) {
                                    echo $i.' ';
                                } else {
                                    echo '<a href="/pages/topicRead.php?id='.$topic['topicId'].'&page='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?></p>

                        <!-- /searchbar -->
                        <!-- pagination-->

                        <?php
                        $getId = $_GET['id'];
                        $sql = "select * from (SELECT (@row_number:=@row_number + 1) AS num, p.*  FROM posts as p, (SELECT @row_number:=0) AS t WHERE postTopic = '$getId') As T1 JOIN users on postBy = userId WHERE num >= '$depart' AND postId order by postDate LIMIT 10";
                        $topicReads = $dbh->prepare($sql);
                        $topicReads->execute();
                        ?>
                    </div>

                    <div class="themed-grid-col mt-4 p-3 rounded bg-light">
                        <?php
                        while($topicRead = $topicReads->fetch()) {
                            ?>

                                <!-- post-reply -->
                                <div class="row rounded bg-white p-4 m-0 mb-3">

                                    <div class="col-2 flex-column d-flex pt-5 pb-4">
                                        <div class=" text-center">
                                            <img src="<?php echo "https://www.gravatar.com/avatar/".md5(strtolower(trim($topicRead['userEmail'])))."?"."&s=80";?>" alt="profile-image" class="mx-auto rounded-circle w-75 border">

                                            <p class="h5 pt-3 text-danger"><?= $topicRead["userNname"]?>
                                                <span class="h6 d-block text-secondary mb-4"><?= getUserLevel($topicRead["userLevel"]) ?></span></p>
                                        </div>
                                        <p class="h6"><span class="font-weight-bold">Posts :</span><span class="text-secondary font-weight-lighter"> <?= $topicRead["userTotalPosts"] ?></span></p>
                                        <p class="h6"><span class="font-weight-bold">Location :</span><span class="text-secondary font-weight-lighter"> <?= $topicRead["userLocation"] ?></span></p>
                                        <p class="h6"><span class="font-weight-bold">Mood :</span><span class="text-secondary font-weight-lighter"> <?= $topicRead["userMood"] ?></span></p>



                                    </div>


                                <div class="col-10 flex-column">
                                    <div class="time-quote">

                                        <p class="my-4 h6 text-secondary"><i class="far fa-clock"></i> <?= formatDate($topicRead["postDate"]) ?>
                                            <?php
                                            if(!is_null($topicRead{"postDateUpdate"}))
                                            {
                                                ?>  </br>Modified at <i class="far fa-clock"></i> <?= formatDate($topicRead["postDateUpdate"])  ?>
                                                <?php
                                            }
                                         
                                            if (isset($_SESSION["user"]) && $_SESSION["user"] == $topicRead{"postBy"} && $topicRead{"postDeleted"} == 0)
                                            {
                                                
                                                ?>
                                                <button type="button" class="btn btn_delete_post bg-light rounded ml-3 rounded-pill border float-right" data-topicId="<?= $topicRead["postTopic"] ?>" data-postId="<?= $topicRead["postId"] ?>"><i class="far fa-trash-alt text-secondary"></i> Delete</button>
                                                <?php 
                                                if ( $topic{"lastPostId"}  == $topicRead{"postId"})
                                                {
                                                ?>
                                                    <button type="button" class="btn btn_update_post bg-light rounded ml-3 rounded-pill border float-right" data-topicId="<?= $topicRead["postTopic"] ?>" data-postId="<?= $topicRead["postId"] ?>"><i class="far fa-edit text-secondary"></i> Edit</button>
                                        </p>
                                    <?php
                                                }
                                            }
                                          
                                            else 
                                            {

                                                ?>
                                        <p></p>
                                                <?php
                                            }
                                           
                                        ?>
                                       

                                    </div>

                                    <div id="postContent_<?= $topicRead["postId"] ?>"><?php
                                    if($topicRead{"postDeleted"} == 1)
                                    {
                                        echo "<i>DELETED</i>";
                                    }
                                    else
                                    {
                                        getMarkdown($topicRead["postContent"]); 
                                    }
                                    ?> </div >
                            <form method="post" id="form_editPost_<?= $topicRead["postId"] ?>" action="/pages/updatePost.php" hidden>
                            
                                <!--Edit-->
                                <div class="form-group">
                                    <textarea id="my-text-area" name="postContent" cols="40" rows="5" required="required"
                                            class="form-control" ><?= $topicRead["postContent"]?></textarea>

                                </div>
                                <input name="postId" type="hidden" value="<?= $topicRead["postId"] ?>" />
                                <input name="topicId" type="hidden" value="<?= $topicRead["postTopic"] ?>" />
                                <div class="text-right board-util d-flex pt-3">
                                <button class="btn btn_cancel_update_post text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="button" data-postId="<?= $topicRead["postId"] ?>">Cancel edition <i class="fas fa-window-close"></i></button>
                                <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">Update post <i class="fas fa-reply"></i></button>
                                </div>
                            </form>

                
                                    <p class="border-top py-3 mt-5 h6 text-secondary"><?= $topicRead["userSign"] ?></p>
                                    <!-- <input type="hidden" value="amo" class="demo"> -->
                                </div>
                               


                            </div>

                        <?php
                        }
                        ?>


                    </div>


                    <div class="board-util d-flex pt-3">
                        <a href="/pages/replyTopic.php?id=<?= $topicId ?>">
                            <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn"
                                    type="button">Post reply <i class="fas fa-reply"></i></button>
                        </a>
                        <!-- searchbar -->
                        <div class="dropdown">
                            <button class="btn bg-light rounded ml-3 rounded-pill border dropdown-toggle"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="fas fas fa-wrench text-black-50"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#!">Delete topic</a>
                                <a class="dropdown-item" href="#!">Lock topic</a>
                                <a class="dropdown-item" href="#!">Reply</a>
                            </div>
                        </div>

                        <p class="ml-auto font-weight-normal greytext pt-2"> <?= count($posts) ?> replies · Page <?php
                            for($i=1;$i<=$pagesTotal;$i++) {
                                if($i == $pageCourante) {
                                    echo $i.' ';
                                } else {
                                    echo '<a href="/pages/topicRead.php?id='.$topic['topicId'].'&page='.$i.'">'.$i.'</a> ';
                                }
                            }
                            ?></p>

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
                                <a class="dropdown-item" href="#!">Previous topic</a>
                                <a class="dropdown-item" href="#!">Next topic</a>
                                <a class="dropdown-item" href="#!">Previous forum</a>
                                <a class="dropdown-item" href="#!">Next forum</a>
                                <a class="dropdown-item" href="#!">Forum</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- start of right side -->

                <?php include_once "../includes/sidebar.php" ?>


                <!-- end of row -->
            </div>
            <!-- end container-lg -->
        </div>


    </div>



<?php include_once "../includes/footer.php" ?>
<!-- <script src="./assets/js/script.js"></script> -->
    <script src="../assets/js/faceMocion.js"></script>
    <script src="../assets/js/topicRead.js"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->