<?php 
function getDatabase() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=carpooling;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'Erreur';
        die();
    }
    return $pdo;
}

function createUser($first_name, $last_name, $email, $password, $phone) {
    $pdo = getDatabase();
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `phone`) VALUES (`:firstname`, `:lastname`, `:email`, `:password`, `:phone`)";
    $req = $pdo->prepare($sql);
    $req->bindValue(':firstname', $first_name, PDO::PARAM_INT);
    $req->bindValue(':lastname', $last_name, PDO::PARAM_INT);
    $req->bindValue(':email', $email, PDO::PARAM_INT);
    $req->bindValue(':password', $password, PDO::PARAM_INT);
    $req->bindValue(':phone', $phone, PDO::PARAM_INT);
    $req->execute();
}