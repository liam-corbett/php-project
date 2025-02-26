<?php

$config = require "config.php";

$db = new Database($config["database"]);


$heading = 'Note';
$currentUserId = 1;

$id = $_GET["id"];

$note = $db->query("SELECT * FROM notes where id = :id", [
    "id" => $id
])->findOrFail();

authorise($note["user_id"] === $currentUserId);

require "views/note.view.php";
