<?php 

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Invalid email address";
}

if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "Please provide a password of at least 7 characters";
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "errors" => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {
    header('location: /l');
    exit();
} else {
    $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION["user"] = [
        "email" => $email
    ];

    header("location: /");
    exit();
}



