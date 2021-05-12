<?php require_once ROOT.'/models/usersModel.php';
$login = 'GuillaumeBongrand1@gmail.com';
$password = 'PatrickBaudry2001!';
$regextext = '/^[A-Za-ÿ]+((\s)?((\'|\-|\.)?([A-Za-z])+))*$/m';
$regexaddress = '/^\d{1,3}\s\w+\s\w+(\s\w+)*\s\d{5}\s\w+$/';
$regexdate = '/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/';
$regexpassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
$regexphone = '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/';
$first_name = '';
$last_name = '';
$birth_date = '';
$password = '';
$email = '';
$phone = '';
$user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);
$options = array(
    'first_name' => FILTER_SANITIZE_STRING,
    'last_name' => FILTER_SANITIZE_STRING,
    'birth_date' => FILTER_SANITIZE_STRING,
    'incomes' => FILTER_SANITIZE_NUMBER_FLOAT,
    'inc_cat_id' => FILTER_SANITIZE_NUMBER_INT,
    'exp_label' => FILTER_SANITIZE_STRING
);
$errors = array();
$posts = filter_input_array(INPUT_POST, $options);
if (!empty($_POST)) {
    extract($_POST);
    if (empty($email)) {
        $errors['email'] = "Le champ est requis";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Le format n'est pas correct";
    }
    if (empty($password)) {
        $errors['password'] = "Le champ est requis";
    }
    else if (!preg_match($regexpassword, $password)) {
        $errors['password'] = "Le format n'est pas correct";
    }
    var_dump($errors);
    if (empty($errors)) {
        $user = getUser($email);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['user_id'];
            $_SESSION['last_name'] = $user['user_id'];
        }
    }
}
require_once ROOT.'/views/home.php';