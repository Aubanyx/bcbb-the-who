<?php
session_start();
if(!isset($_SESSION["user"])) { //if user is not connected, he cannot reply to a topic
  header("Location: /pages/login.php");
}

require_once "../library/functions.php";
require_once '../assets/Michelf/Markdown.inc.php';
$dbh = connect();


//Verify if we have a form POST, we post the reply
if (!empty($_POST)) {
  $erreur = createPost();

  if (!$erreur) //There is no error while post creation, we get the post id to redirect to the topic page, otherwise, redirect to home page
  {
    if ($_POST["topicId"]) 
    {
      header("location: /pages/topicRead.php?id=" . $_POST["topicId"]);
      exit();
    }
    else
    {
      //header("location: http://localhost/bcbb-the-who/");
      //exit();
    }
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
    $topicId = $_GET["id"];
    $topic = getTopicById($topicId);
   

    if (count($topic) != 1) 
      $redirect = true; //If array count is different from 1, the topic was not found in database
    else
      $topic = $topic[0]; //Retrieve first element from array and assign it in $topic
}

if ($redirect)
{
    header('location: /index.php');
    exit();
}

$lasttopics = displayLastT();
$lastConnectedUsers = getLastConnectedUsers();
$page = "Home";

include_once "../includes/header.php";
?>
   
   <!-- forum body -->

<!-- main container -->
<div class="container overlay position-relative shadow-sm rounded-lg bg-white pb-5">          
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pt-5">
      <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Home</a></li>
      <li class="breadcrumb-item"><a href="/pages/topicIcon.php?id=<?= $topic['topicBoard'] ?>"></i> Board : <?= $topic['boardName'] ?></a></li> 
      <li class="breadcrumb-item"><a href="/pages/topicRead.php?id=<?= $topic['topicId'] ?>"></i> Topic : <?= $topic['topicSubject'] ?></a></li>
      <li class="breadcrumb-item active" aria-current="page">New post</li>     
    </ol>
  </nav>

<div class="container-lg">

<div class="row">  

<div class="col-xl-9 themed-grid-col">
<h3> <?= getMarkdown("Topic : " . $topic["topicSubject"]) ?></h3>
<div class="alert alert-danger" role="alert">
Forum rules
</div>


<div class="themed-grid-col mt-4 p-3 rounded bg-light">
 
<form method="post">

                <div class="form-group">
                  <textarea
                    class="form-control form-control-rounded"
                    id="message_text"
                    rows="8"
                    placeholder="Write your message here..."
                    required=""
                    name="postContent"
                  ></textarea>
                  <input name="topicId" type="hidden" value="<?= $topicId ?>" />
                </div>

                <div class="text-right board-util d-flex pt-3">
                <button class="btn text-white px-4 py-2 border-0 rounded rounded-pill board-util__btn" type="submit">Post reply <i class="fas fa-reply"></i></button>
                </div>
                <?php
                if (isset($erreur)) : //If there is an error while post creation, we display the error on the page
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

<script src="./assets/js/script.js"></script>
<?php include_once "../includes/footer.php" ?>
