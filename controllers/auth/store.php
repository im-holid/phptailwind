<?php

use Core\AppContainer;
use Core\Database;
use Core\Validator;

$db = AppContainer::resolve(Database::class);
$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$name = $_POST['name'];


// validate
if (Validator::checkWhiteSpace(($password))) $errors['password'] = 'whitespace isnt allowed';
else if (Validator::string($password, 4, 100)) {
    $errors['password'] = 'Password to short';
} else if ($repassword !== $password) {
    $errors['password'] = 'Password didnt match';
    $errors['repassword'] = 'Password didnt match';
}

if (!Validator::email(($email))) $errors['email'] = 'Invalid Email';

if (Validator::string(($name), 4)) $errors['name'] = 'Invalid Name';

$existUser = $db->checkEmail($email)->fetch();
if (isset($existUser['email'])) $errors['email'] = 'Email already exist';

if (!empty($errors)) {
    $users = $db->fetchAllUser()->fetchAllOrFail();
    view('views/auth/register.view.php', ['heading' => 'Register', 'errors' => $errors, 'post' => $_POST]);
    exit();
}

$db->storeUser($name, $email, $password);

$_SESSION['isLogin'] = true;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

header('location: /');
exit();
