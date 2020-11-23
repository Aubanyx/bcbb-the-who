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

