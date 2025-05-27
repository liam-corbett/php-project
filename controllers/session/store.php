<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Invalid email address";
}

if (!Validator::string($password)) {
    $errors["password"] = "Please provide a valid password";
}

if (!empty($errors)) {
    return view("session/create.view.php", [
        "errors" => $errors
    ]);
}

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {

    if (password_verify($password, $user['password'])) {
        login([
            "email" => $user['email']
        ]);

        header("location: /");
        exit();
    } 
}

    
return view("session/create.view.php", [
    "errors" => [
        "email" => "Invalid Credentials.",
        "password" => "Invalid Credentials."
    ]
]);
