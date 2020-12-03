<?php


// DB
function connect()
{

    $dsn = 'mysql:dbname=tKrWsqaR52;host=remotemysql.com:3306;charset=utf8mb4';
    $user = 'tKrWsqaR52';
    $password = 'KEgiRtJGfk';

    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
    return $dbh;
}

// users
//function user() {
//   global $dbh;
//
//   $sql = "SELECT * FROM users";
//
//   $user = $dbh->prepare($sql);
//   $user->execute();
//   $user = $user->fetch(PDO::FETCH_ASSOC);
//
//   return $user;
//}

// Boards


function displayCategories()
{
    global $dbh;

    $sql = "SELECT * FROM categories";

    $resultsCat = $dbh->query($sql);
    $resultsCat = $resultsCat->fetchAll(PDO::FETCH_ASSOC);

    return $resultsCat;
}

function displayBoards($id)
{
    global $dbh;

    $sql = "SELECT * FROM boards WHERE categoryId = :id";

    $resultsCat = $dbh->prepare($sql);
    $resultsCat->execute(array(":id" => $id));
    $resultsCat = $resultsCat->fetchAll(PDO::FETCH_ASSOC);

    return $resultsCat;
}

function countTopics($id)
{
    global $dbh;
    $sql = "SELECT count(topicId) as nbrOfTopics FROM topics WHERE topicBoard = ?";
    $totalCountTopics = $dbh->prepare($sql);
    $totalCountTopics->execute([$id]);
    $totalCountTopics = $totalCountTopics->fetchAll(PDO::FETCH_ASSOC);
    return $totalCountTopics;
}


function countPosts($id)
{
    global $dbh;
    $sql = "SELECT count(postId) as nbrOfPosts FROM topics JOIN posts ON postTopic = topicId WHERE topicBoard = ?";

    $totalCountPosts = $dbh->prepare($sql);
    $totalCountPosts->execute([$id]);
    $totalCountPosts = $totalCountPosts->fetchAll(PDO::FETCH_ASSOC);
    return $totalCountPosts;
}


function displayPosts($id)
{
    global $dbh;

    $sql = "SELECT postContent FROM posts WHERE postTopic = ? LIMIT 1";
    $resultsPosts = $dbh->prepare($sql);
    $resultsPosts->execute([$id]);
    $resultsPosts = $resultsPosts->fetchAll(PDO::FETCH_ASSOC);

    return $resultsPosts;
}

function BoardLastPost($id)
{
    global $dbh;

    $sql = "SELECT postDate FROM posts  JOIN topics ON postTopic = topicId WHERE topicBoard = ? ORDER BY postDate DESC LIMIT 1";

    $resultsBLP = $dbh->prepare($sql);
    $resultsBLP->execute([$id]);
    $resultsBLP = $resultsBLP->fetchAll(PDO::FETCH_ASSOC);

    return $resultsBLP;
}


function displayLastT()
{
    global $dbh;

    $sql = "SELECT * FROM topics ORDER BY topicDate DESC LIMIT 4";

    $resultsLastP = $dbh->query($sql);
    $resultsLastP = $resultsLastP->fetchAll(PDO::FETCH_ASSOC);

    return $resultsLastP;
}

//get 3 last connected users
function getLastConnectedUsers()
{
    global $dbh;

    $sql = "SELECT * FROM users ORDER BY userLastConnectionDate DESC LIMIT 3";

    $results = $dbh->query($sql); //execute query
    $results = $results->fetchAll(PDO::FETCH_ASSOC); //lire toutes les lignes

    return $results;

}

function getTimeAgo($ptime)
{
    $estimate_time = time() - $ptime;

    if ($estimate_time < 1) {
        return 'just now';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60 => 'month',
        24 * 60 * 60 => 'day',
        60 * 60 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($condition as $secs => $str) {
        $d = $estimate_time / $secs;

        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}


// function displayBoards() {
//    global $dbh;

//    $sql = "SELECT * FROM boards";

//  $results = $dbh->query($sql);
//  $results = $results->fetchAll(PDO::FETCH_ASSOC);

//    return $results;
// }

// Inscription
function inscription()
{
    global $dbh;

    extract($_POST);

    $validation = true;
    $erreur = [];
    $sql = "INSERT INTO users(userNname, userPass, userFname, userLname, userEmail, userSign, userOnline, userDate, userLevel) VALUES(:username, :password, :fName, :lName, :email, NULL, 0, NOW(), 0)";

    if (empty($fName) || empty($lName) || empty($username) || empty($email) || empty($password) || empty($passwordConf)) {
        $validation = false;
        $erreur[] = "Tous les champs sont obligatoires";
    }

    if (!$fName) {
        $validation = false;
        $erreur[] = "Le champ First Name n'est pas valide";
    }

    if (!$lName) {
        $validation = false;
        $erreur[] = "Le champ Last Name n'est pas valide";
    }

    if (existeUsername($username)) {
        $validation = false;
        $erreur[] = "Ce pseudo est déjà pris";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $erreur[] = "L'adresse e-mail n'est pas valide";
    }

    if ($passwordConf != $password) {
        $validation = false;
        $erreur[] = "Le mot de passe de confirmation est incorrecte";
    }

    if ($validation) {
        $inscription = $dbh->prepare($sql);
        $inscription->execute([
            "fName" => htmlentities($fName),
            "lName" => htmlentities($lName),
            "username" => htmlentities($username),
            "email" => htmlentities($email),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    unset($_POST["username"]);
    unset($_POST["fName"]);
    unset($_POST["lName"]);
    unset($_POST["email"]);
    unset($_POST["password"]);
    unset($_POST["passwordConf"]);
//
    return $erreur;
}

// userName existe
function existeUsername($username)
{
    global $dbh;

    $sql = "SELECT COUNT(*) FROM users WHERE userNname = ?";

    $resultat = $dbh->prepare($sql);
    $resultat->execute([$username]);
    $resultat = $resultat->fetch()[0];

    return $resultat;
}

// email existe
function existeEmail($email)
{
    global $dbh;

    $sql = "SELECT COUNT(*) FROM users WHERE userEmail = ?";

    $resultat = $dbh->prepare($sql);
    $resultat->execute([$email]);
    $resultat = $resultat->fetch()[0];

    return $resultat;
}

// Connexion
function connexion()
{
    global $dbh;

    $username = "";
    $password = "";
    echo $_POST;
    extract($_POST);

    $sql = "SELECT userId, userNname, userPass FROM users WHERE userNname = ?";
    $erreur = "Les identifiants sont erronés";

    $connexion = $dbh->prepare($sql);
    $connexion->execute([$username]);
    $connexion = $connexion->fetch();


    if (password_verify($password, $connexion["userPass"])) {
        $_SESSION["user"] = $connexion["userId"];
        $connexion = $dbh->prepare("UPDATE users SET userLastConnectionDate = now() WHERE userNname =:username");
        $connexion->bindParam(":username", $username);
        $connexion->execute();
        header("Location: ../pages/profile.php");
    } else {
        return $erreur;
    }
}

// Deconnexion
function deconnexion()
{
    unset($_SESSION["user"]);
    session_destroy();
    header("Location: ../index.php");
}

// informations
function infos()
{
    global $dbh;

    $sql = "SELECT * FROM users WHERE userId = ?";

    $user = $dbh->prepare($sql);
    $user->execute([$_SESSION["user"]]);
    $user = $user->fetch();

    return $user;
}

// Profile
function changeInfosProfile($form)
{
    global $dbh;

    extract($_POST);

    $infos = infos();
    $validation = true;
    $validationFile = true;
    $erreur = [];
    $sql = "UPDATE users
            SET userNname = ?,
                userPass  = ?,
                userFname = ?,
                userLname = ?,
                userEmail = ?,
                userSign  = ?,
                userMood  = ?,
                userLocation  = ?,
                userBirthday  = ?
            WHERE userId = ?";

    if (empty($username) && empty($currentPass) && empty($newPass) && empty($newPassConf) && empty($fName) && empty($lName) && empty($email) && empty($sign) && empty($mood) && empty($location) && ($form["birthday"] == $infos["userBirthday"]) && ($_FILES["file"]["error"] > 0)) {
        $validation = false;
        $erreur[] = "Veuillez modifier au moins un champ";
    }

    if (existeUsername($username)) {
        $validation = false;
        $erreur[] = "Ce pseudo est déjà pris";
    }

    if (existeEmail($email)) {
        $validation = false;
        $erreur[] = "Cet email est déjà pris";
    }

    if (!empty($form["currentPass"])) {
        if (!password_verify($form["currentPass"], $infos["userPass"])) {
            $validation = false;
            $erreur[] = "Le mot de passe actuel est incorrecte";
        }
    }

    if ($newPass != $newPassConf) {
        $validation = false;
        $erreur[] = "Le mot de passe de confirmation est incorrecte";
    }

    if ($_FILES["file"]["error"] != 0 && $_FILES["file"]["error"] != 4) {
        $validationFile = false;
        $erreur[] = "Il faut indiquer un fichier à uploader";
    }

    // Changements profile
    if ($validation) {
        $user = $dbh->prepare($sql);
        $user->execute([

            $newUsername = empty($form["username"]) ? htmlentities($infos["userNname"]) : htmlentities($form["username"]),
            $newPassword = empty($form["newPass"]) ? $infos["userPass"] : password_hash($form["newPass"], PASSWORD_DEFAULT),
            $newFname = empty($form["fName"]) ? htmlentities($infos["userFname"]) : htmlentities($form["fName"]),
            $newLname = empty($form["lName"]) ? htmlentities($infos["userLname"]) : htmlentities($form["lName"]),
            $newEmail = empty($form["email"]) ? htmlentities($infos["userEmail"]) : htmlentities($form["email"]),
            $newSign = empty($form["sign"]) ? htmlentities($infos["userSign"]) : htmlentities($form["sign"]),
            $newMood = empty($form["mood"]) ? htmlentities($infos["userMood"]) : htmlentities($form["mood"]),
            $newLocation = empty($form["location"]) ? htmlentities($infos["userLocation"]) : htmlentities($form["location"]),
            $newBirthday = empty($form["birthday"]) ? htmlentities($infos["userBirthday"]) : htmlentities($form["birthday"]),

            $_SESSION["user"]
        ]);
    }

    // Upload et changement d'avatar
    if ($validationFile) {
        $image = basename($_FILES["file"]["name"]);
        $sql = "UPDATE users
            SET userImage = ?
            WHERE userId = ?";

        move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/images/avatar/" . $image);

        $upload = $dbh->prepare($sql);
        $upload->execute([
            htmlentities($image),
            $_SESSION["user"]
        ]);
    }

    unset($_POST["username"]);
    unset($_POST["currentPass"]);
    unset($_POST["newPass"]);
    unset($_POST["newPassConf"]);
    unset($_POST["fName"]);
    unset($_POST["lName"]);
    unset($_POST["email"]);
    unset($_POST["sign"]);
    unset($_POST["mood"]);
    unset($_POST["location"]);
    unset($_POST["birthday"]);

    return $erreur;
}

// TopicIcon
function topics()
{
    global $dbh;

    $sql = "SELECT * FROM topics WHERE topicBoard = ?";

    $topicsRequest = $dbh->prepare($sql);

    $topicsRequest->execute(
        [
            $_GET['id']
        ]
    );

    $topicsRequest = $topicsRequest->fetchAll(PDO::FETCH_ASSOC);

    return $topicsRequest;
}

// display the name of the creator of a topic in topicIcon
function topicsName($id)
{
    global $dbh;

    $sql = "SELECT userNname FROM users WHERE userId=?";

    $topicsNameRequest = $dbh->prepare($sql);
    $topicsNameRequest->execute([$id]);
    $topicsNameRequest = $topicsNameRequest->fetch(PDO::FETCH_ASSOC);

    return $topicsNameRequest["userNname"];
}

// Display the name and de date of the last message on a topic in topicIcon
function topicsLastMsg($id)
{
    global $dbh;

    $sql = "SELECT postBy, postDate FROM posts WHERE postTopic=? ORDER BY postId DESC LIMIT 1";
    $topicsLastPostRequest = $dbh->prepare($sql);
    $topicsLastPostRequest->execute([$id]);
    $topicsLastPostRequest = $topicsLastPostRequest->fetch(PDO::FETCH_ASSOC);


    $sql = "SELECT userNname FROM users WHERE userId=?";

    $topicsLastPostRequestName = $dbh->prepare($sql);
    $topicsLastPostRequestName->execute([$topicsLastPostRequest["postBy"]]);
    $topicsLastPostRequestName = $topicsLastPostRequestName->fetch(PDO::FETCH_ASSOC);

    return [$topicsLastPostRequestName["userNname"], $topicsLastPostRequest["postDate"]];
}

// Display number of posts on a topic
function countPostsOnTopic($id)
{
    global $dbh;
    $sql = "SELECT count(postId) AS countPosts FROM posts WHERE postTopic = ?";
    $totalCountPosts = $dbh->prepare($sql);
    $totalCountPosts->execute([$id]);
    $totalCountPosts = $totalCountPosts->fetch(PDO::FETCH_ASSOC);
    return $totalCountPosts;
}

// function postsOnTopics($id){
//     global $dbh;
//     $sql = "SELECT postId FROM posts WHERE postTopic = ?";
//     $postsOnTopic = $dbh->prepare($sql);
//     $postsOnTopic->execute([$id]);

//     $test = $sql->fetchColumn();

//     return $test;
// } 


function getUserLevel($userLevel)
{
    if ($userLevel == 2)
        return "Administrator";

    return "User";
}


function formatDate($input)
{
    if (is_null($input))
        return "";

    $date = new DateTime($input);
    return date_format($date, "D M j, Y, g:i a");
}


//get topic by id from database
function getTopicById($topicId)
{
    global $dbh;

    $sql = "SELECT * FROM topics WHERE topicId = ?";
    $topic = $dbh->prepare($sql);
    $topic->execute([$topicId]);
    $topic = $topic->fetchAll(PDO::FETCH_ASSOC);

    return $topic;
}

//get board by id from database
function getBoardById($boardId)
{
    global $dbh;

    $sql = "SELECT * FROM boards WHERE boardId = ?";
    $board = $dbh->prepare($sql);
    $board->execute([$boardId]);
    $board = $board->fetchAll(PDO::FETCH_ASSOC);

    return $board;
}

// Get comments for a topic from database
function getPostsByTopicId($topicId)
{
    global $dbh;
    //userPostsCount is number of posts of user
    $sql = "SELECT *,(select count(*) from posts where postBy = userId ) as userPostsCount FROM posts inner join users on postBy = userId WHERE postTopic = ?";
    $resultsPosts = $dbh->prepare($sql);
    $resultsPosts->execute([$topicId]);
    $resultsPosts = $resultsPosts->fetchAll(PDO::FETCH_ASSOC);

    return $resultsPosts;
}

// Répondre à un sujet

function createPost()
{
    global $dbh;

    extract($_POST);

    if (!isset($_SESSION['user'])) {  //user is not authenticated, redirect to post page
        header("location: ../pages/login.php");
    }

    if (!isset($topicId))
        return "Topic id value is required";

    $currentUserId = $_SESSION["user"];

    //Verify input
    if (empty($postContent)) return "Post content is required";


    try {
        $sql = "INSERT INTO posts (postContent,postDate,postDateUpdate,postDeleted,postTopic,postBy) VALUES(:postContent, now(),now(),0, :postTopic, :postBy)";

        $postCreation = $dbh->prepare($sql);
        $postCreation->execute([
            "postContent" => $postContent,
            "postTopic" => $topicId,
            "postBy" => $currentUserId
        ]);


    } catch (Exception $exception) {
        return "An internal error occurs while post creation : " . $exception->getMessage();
    }

}

//Create a topic

function createTopic()
{
    global $dbh;

    extract($_POST);

    if (!isset($_SESSION['user'])) {  //user is not authenticated, redirect to post page
        header("location: ../pages/login.php");
    }

    if (!isset($boardId))
       return "Board id value is required";

    $currentUserId = $_SESSION["user"];

    //Verify input
    if (empty($topicSubject)) return "Topic subject is required";
    if (empty($topicContent)) return "Topic content is required";

    //TODO Create a transaction
    try {

        $sql = "INSERT INTO topics (topicSubject,topicDate,topicDateUpdate,topicImage,topicBoard,topicBy) VALUES(:topicSubject, now(),now(),'', :topicBoard, :topicBy)";
       
        $topicCreation = $dbh->prepare($sql);
   
        $topicCreation->execute([
            "topicSubject" => $topicSubject,
            "topicBoard" => $boardId,
            "topicBy" => $currentUserId
        ]);

        $topicId = $dbh->lastInsertId();
        $sql = "INSERT INTO posts (postContent,postDate,postDateUpdate,postDeleted,postTopic,postBy) VALUES(:postContent, now(),now(),0, :postTopic, :postBy)";

        $postCreation = $dbh->prepare($sql);
        $postCreation->execute([
            "postContent" => $topicContent,
            "postTopic" => $topicId,
            "postBy" => $currentUserId
        ]);
          

    } catch (Exception $exception) {
        return "An internal error occurs while topic creation : " . $exception->getMessage();
    }

}


// Display 5 topics on "random" board
function topicsRandom()
{
    global $dbh;

    $sql = "SELECT * FROM topics WHERE topicBoard = 8 ORDER BY topicDate ASC LIMIT 5";

    $topicRand = $dbh->prepare($sql);
    $topicRand->execute();

    $topicRand = $topicRand->fetchAll(PDO::FETCH_ASSOC);

    return $topicRand;
}

// Display the name of the board in topicIcon
function boardName($id)
{
    global $dbh;

    $sql = "SELECT * FROM boards WHERE boardId = ?";

    $nameOfBoard = $dbh->prepare($sql);
    $nameOfBoard->execute([$id]);
    $nameOfBoard = $nameOfBoard->fetch(PDO::FETCH_ASSOC);

    return $nameOfBoard;
}

function getMarkdown($text)
{
    $markdowned_text = Michelf\Markdown::defaultTransform($text);
    echo $markdowned_text;
}

 
function categoryName($id)
{
    global $dbh;

    $sql = "SELECT * FROM categories WHERE categoryId = ?";

    $nameOfCat = $dbh->prepare($sql);
    $nameOfCat->execute([$id]);
    $nameOfCat = $nameOfCat->fetch(PDO::FETCH_ASSOC);

    return $nameOfCat;
}
?>
