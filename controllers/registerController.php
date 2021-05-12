<?php require_once __DIR__.'../models/usersModel.php';
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
    if (empty($first_name)) {
        $errors['firstname'] = "Le champ est requis";
    } elseif (!preg_match($regextext, $first_name)) {
        $errors['firstname'] = "Le format n'est pas correct";
    }
    if (empty($last_name)) {
        $errors['lastname'] = "Le champ est requis";
    } elseif (!preg_match($regextext, $last_name)) {
        $errors['lastname'] = "Le format n'est pas correct";
    } 
    if (empty($email)) {
        $errors['email'] = "Le champ est requis";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_FLOAT)) {
        $errors['email'] = "Le format n'est pas correct";
    }
    if (empty($password)) {
        $errors['password'] = "Le champ est requis";
    }
    else if (!preg_match($regexpassword, $password)) {
        $password['password'] = "Le format n'est pas correct";
    }
    if (empty($phone)) {
        $errors['password'] = "Le champ est requis";
    }
    else if (!preg_match($regexphone, $phone)) {
        $phone['password'] = "Le format n'est pas correct";
    }
    if (empty($errors)) {
            if (createUser($first_name, $last_name, $email, $password, $phone )) {
                header('location:index.php');
                exit();
            }
    }
}
