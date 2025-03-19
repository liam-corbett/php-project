<?php 

$_SESSION["name"] = "John Doe";

view("index.view.php", [
    "heading" => "Home Page",
]);

