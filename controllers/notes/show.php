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


view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note
]);

