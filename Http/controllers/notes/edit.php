<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

// $id = $_GET["id"];

$note = $db->query("SELECT * FROM notes where id = :id", [
    "id" => $_GET["id"]
])->findOrFail();

authorise($note["user_id"] === $currentUserId);

view("notes/edit.view.php", [
    "heading" => "Edit note",
    "errors" => [],
    "note" => $note
]);
