<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config["database"]);

$currentUserId = 1;

// $id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $note = $db->query("SELECT * FROM notes where id = :id", [
        "id" => $_GET["id"]
    ])->findOrFail();

    authorise($note["user_id"] === $currentUserId);

    $db->query("DELETE FROM notes WHERE id = :id", [
        "id" => $_GET["id"]
    ]);

    header("location: /notes");
    exit();
} else {

    $note = $db->query("SELECT * FROM notes where id = :id", [
        "id" => $_GET["id"]
    ])->findOrFail();

    authorise($note["user_id"] === $currentUserId);


    view("notes/show.view.php", [
        "heading" => "Note",
        "note" => $note
    ]);
}
