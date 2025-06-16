<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

 
$currentUserId = 1;

// $id = $_GET["id"];

$note = $db->query("SELECT * FROM notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();

authorise($note["user_id"] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", [
    "id" => $_POST["id"]
]);

header("location: /notes");
exit();

