<?php

// DB
function connect() {

    $dsn = 'mysql:dbname=tKrWsqaR52;host=remotemysql.com:3306;charset=utf8';
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
function user() {
   global $dbh;

   $sql = "SELECT userId, userNname, userFname, userLname, userEmail FROM users";

   $user = $dbh->prepare($sql);
   $user->execute();
   $user = $user->fetch(PDO::FETCH_ASSOC);

   return $user;
}
//

// Boards


function displayBoards($id) {
 global $dbh;

    $sql = "SELECT * FROM boards WHERE categoryId = :id";

    $resultsCat = $dbh->prepare($sql);
    $resultsCat->execute(array(":id"=>$id));
    $resultsCat = $resultsCat->fetchAll(PDO::FETCH_ASSOC);

    return $resultsCat;
}


function displayCategories() {
   global $dbh;

    $sql = "SELECT * FROM categories";

    $resultsCat = $dbh->query($sql);
    $resultsCat = $resultsCat->fetchAll(PDO::FETCH_ASSOC);

    return $resultsCat;
}

function displayPosts($id) {
    global $dbh;

    $sql = "SELECT postContent FROM posts WHERE postTopic = ?";

    $resultsPosts= $dbh->prepare($sql);
    $resultsPosts->execute([$id]);
    $resultsPosts = $resultsPosts->fetchAll(PDO::FETCH_ASSOC);

    return $resultsPosts;
}

function displayLastT() {
    global $dbh;

    $sql = "SELECT * FROM topics";

    $resultsLastP = $dbh->query($sql);
    $resultsLastP = $resultsLastP->fetchAll(PDO::FETCH_ASSOC);

    return $resultsLastP;
}

function getTimeAgo( $ptime )
{
    $estimate_time = time() - $ptime;

    if( $estimate_time < 1 )
    {
        return 'just now';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60  =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
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
function inscription() {
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

    if (existe($username)) {
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
function existe($username) {
    global $dbh;

    $sql = "SELECT COUNT(*) FROM users WHERE userNname = ?";

    $resultat = $dbh->prepare($sql);
    $resultat->execute([$username]);
    $resultat = $resultat->fetch()[0];

    return $resultat;
}

// Connexion
function connexion() {
    global $dbh;

    $username = "";
    $password = "";

    extract($_POST);

    $sql = "SELECT userId, userNname, userPass FROM users WHERE userNname = ?";
    $erreur = "Les identifiants sont erronés";

    $connexion = $dbh->prepare($sql);
    $connexion->execute([$username]);
    $connexion = $connexion->fetch();


    if (password_verify($password, $connexion["userPass"])) {
        $_SESSION["user"] = $connexion["userId"];
        header("Location: ../pages/profile.php");
    }
    else {
        return $erreur;
    }
}

// Deconnexion
function deconnexion() {
    unset($_SESSION["user"]);
    session_destroy();
    header("Location: ../pages/login.php");
}

// informations
function infos() {
    global $dbh;

    $sql = "SELECT userId, userNname, userFname, userLname, userEmail, userSign, userLevel FROM users WHERE userId = ?";

    $user = $dbh->prepare($sql);
    $user->execute([$_SESSION["user"]]);
    $user = $user->fetch();

    return $user;
}

// Profile
 function changeInfosProfile($form) {
    global $dbh;

    extract($_POST);

    $validation = true;
    $erreur = [];
    $sql = "UPDATE users
            SET userNname = ?,
                userFname = ?,
                userLname = ?,
                userEmail = ?,
                userSign  = ?
            WHERE userId = ?";

     if (empty($fName) && empty($lName) && empty($username) && empty($email) && empty($sign)) {
         $validation = false;
         $erreur[] = "Veuillez modifier au moins un champ";
     }

     if (existe($username)) {
         $validation = false;
         $erreur[] = "Ce pseudo est déjà pris";
     }

     if ($validation) {
         $user = $dbh->prepare($sql);
         $user->execute([
             htmlentities($form["username"]),
             htmlentities($form["fName"]),
             htmlentities($form["lName"]),
             htmlentities($form["email"]),
             htmlentities($form["sign"]),
             $_SESSION["user"]
         ]);
//         $user = $user->fetch(PDO::FETCH_ASSOC);
     }

     unset($_POST["username"]);
     unset($_POST["fName"]);
     unset($_POST["lName"]);
     unset($_POST["email"]);
     unset($_POST["sign"]);

     return $erreur;
}

//}
function topics() {
    global $dbh;

    $sql = "SELECT * FROM topics";

    $topicsRequest = $dbh->prepare($sql);
    $topicsRequest->execute([$_SESSION["topics"]]);
    $topicsRequest = $topicsRequest->fetchAll(PDO::FETCH_ASSOC);

    return $topicsRequest;
}

function topicsName($id) {
    global $dbh;

    $sql = "SELECT userNname FROM users WHERE userId=?";

    $topicsNameRequest = $dbh->prepare($sql);
    $topicsNameRequest->execute([$id]);
    $topicsNameRequest = $topicsNameRequest->fetch(PDO::FETCH_ASSOC);

    return $topicsNameRequest["userNname"];
}

function topicsLastMsg($id) {
    global $dbh;

    $sql = "SELECT userNname FROM users WHERE userId=?";

    $topicsNameRequest = $dbh->prepare($sql);
    $topicsNameRequest->execute([$id]);
    $topicsNameRequest = $topicsNameRequest->fetch(PDO::FETCH_ASSOC);

    return $topicsNameRequest["userNname"];
}