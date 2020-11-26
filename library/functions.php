<?php

// DB
function connect() {
    $dsn = 'mysql:dbname=bcbb;host=localhost;charset=utf8';
    $user = 'bcbb-the-who';
    $password = 'bcbb-the-who';

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
//    global $dbh;
//
//    $sql = "SELECT userId, userNname, userFname, userLname, userEmail FROM users";
//
//    $user = $dbh->prepare($sql);
//    $user->execute();
//    $user = $user->fetch(PDO::FETCH_ASSOC);
//
//    return $user;
//}
//
//function users() {
//    global $dbh;
//
//    $sql = "SELECT userId, userNname, userFname, userLname, userEmail FROM users";
//
//    $users = $dbh->query($sql);
//    $users = $users->fetchAll(PDO::FETCH_ASSOC);
//
//    return $users;
//}

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
        $erreur[] = "Ce pseudo est déjà prit";
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
// function changeInfosProfile() {
//    global $dbh;
//
//    extract($_POST);
//
//    $sql = "UPDATE users
//            SET userNname = :username,
//                userFname = :fName,
//                userLname = :lName,
//                userEmail = :email,
//                userSign = :sign
//            WHERE userId = ?";
//
//     $user = $dbh->prepare($sql);
//     $user->execute([$_SESSION["user"]]);
//     $user = $user->fetch();
//
//     return $user;
//}