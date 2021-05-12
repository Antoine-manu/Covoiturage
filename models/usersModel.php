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
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `phone`) VALUES (:firstname, :lastname, :email, :password, :phone)";
    $req = $pdo->prepare($sql);
    $req->bindValue(':firstname', $first_name, PDO::PARAM_STR);
    $req->bindValue(':lastname', $last_name, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
    $req->bindValue(':phone', $phone, PDO::PARAM_STR);
    try {
        $req->execute();
    }
    catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}

function getUser($email) {
    $pdo = getDatabase();
    $sql = "SELECT `first_name`, `last_name`, `user_id`, `email`, `password` FROM `users`
            WHERE email = :email";
    $req = $pdo->prepare($sql);
    $req->bindValue(':email', $email, PDO::PARAM_STR);

    try {
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}