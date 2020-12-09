<?php
session_start();
ob_start();
if(!isset($_SESSION["user"])) { //if user is not connected, he cannot create topic
    header("Location: /pages/login.php");
}

require_once "../library/functions.php";
$dbh = connect();

//Verify if we have a form POST, we create the topic
if (!empty($_POST)) {
    $erreur = createTopic();
  
    if (!$erreur) //There is no error while topic creation, we get the board id to redirect to the board page, otherwise, redirect to home page
    {
      if ($_POST["boardId"]) 
      {
        header("location: /pages/topicIcon.php?id=" . $_POST["boardId"]);
        exit();
      }
      else
      {
        header("location: /index.php");
        exit();
      }
    }
    else
    {
      unset($_POST);
    }    
  }
  
  //If there is no post
  $redirect = false;
  if (!isset($_GET["id"])) //If no id is specified in url, we redirect to index page
  {
      $redirect = true;
  }
  else
  {
      $boardId = $_GET["id"];
      $board = getBoardById($boardId);
     
  
      if (count($board) != 1) 
        $redirect = true; //If array count is different from 1, the topboardic was not found in database
      else
        $board = $board[0]; //Retrieve first element from array and assign it in $topic
  }
  
  if ($redirect)
  {
      header('location: /index.php' );
      exit();
  }

$lasttopics = displayLastT();
$page = "New Topic";

$topicId = $_GET["id"];
$topic = getTopicById($topicId);
$toptop = topicBreadcrumb($topicId);
include_once "../includes/header.php";


?>

    <!-- forum body -->

    <!-- main container -->
    <div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent pt-5">
                <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="/pages/topicIcon.php?id=<?= $toptop[0]['topicId'] ?>"></i> Board : <?= $board['boardName'] ?></a></li> 
                <li class="breadcrumb-item active" aria-current="page">New Topic</li>     
            </ol>
        </nav>



        <div class="container-lg">

            <div class="row">

                <div class="col-xl-9 themed-grid-col">
                <h3>Board <?= $board["boardName"]?> </h3>
                    <div class="alert alert-danger" role="alert">
                        Forum rules
                    </div>

                    <div class="themed-grid-col mt-4 p-3 rounded bg-light">
                        <!-- start form !-->
                        <form method="post">
                            

                            <div class="form-group">
                                <label for="text">Topic subject</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-comment"></i>
                                        </div>
                                    </div>
                                    <input id="text" name="topicSubject" type="text" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea1">Content</label>
                                <textarea id="my-text-area" name="topicContent" cols="40" rows="5" required="required"
                                          class="form-control"></textarea>

                            </div>
                            <input name="boardId" type="hidden" value="<?= $boardId ?>" />
                            <div class="text-right board-util d-flex pt-3">
                            <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">Create topic <i class="fas fa-reply"></i></button>
                            </div>
                            <?php
                            if (isset($erreur)) : //If there is an error while topic creation, we display the error on the page
                                if ($erreur) :
                                
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-danger"><?= $erreur ?></div>
                                            </div>
                                        </div>
                                    <?php
                    
                                endif;
                            endif;
                            ?>
                        </form>

                        <!-- end form ! -->
                    </div>


                </div>


                <!-- start of right side -->
                <?php include_once "../includes/sidebar.php" ?>


                <!-- end of row -->
            </div>
            <!-- end container-lg -->
        </div>
        <!-- end main container -->

    </div>

<?php include_once "../includes/footer.php" ?>