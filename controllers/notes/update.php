<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// Find the corresponding note
$note = $db->query("SELECT * FROM notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();

//Authorise the user
authorise($note["user_id"] === $currentUserId);

//Validate the form
$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "A body of no more than 1000 characters is required.";
}

//If no validation errors, update the note
if(count(($errors))) {
    return view("notes/edit.view.php", [
        "heading" => "Edit note",
        "errors" => $errors,
        "note" => $note
    ]);
}
$db->query("UPDATE notes SET body = :body WHERE id = :id", [
    "body" => $_POST["body"],
    "id" => $_POST["id"]
]);

//Redirect the user
header("location: /notes");
die();