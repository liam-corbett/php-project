<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class) {
    //Core\Database
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

// require base_path("Core/Router.php");

$router = new \Core\Router;

$routes = require base_path("routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$method = $POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);


// $config = require "config.php";

// $db = new Database($config["database"]);

//Connect to our MySQL database.

// class person {
//     public $name;
//     public $age;
    

//     public function breath() {
//         // echo "I am breathing";
//         echo $this->name . " is breathing";
//     }

// }

// $person = new person();

// $person->name = "John Doe ";
// $person->age = 25;

// $person->breath();

// Connect to the database and execute a query.






// $id = $_GET["id"];
// $query = "SELECT * FROM posts WHERE id = :id";



// dd($query);


//Single Fetch
// $posts = $db->query("SELECT * FROM posts")->fetch(PDO::FETCH_ASSOC);   

// dd($posts["title"]);

//Multiple Fetch
// $posts = $db->query($query, [":id" => $id])->fetch();   

// dd($posts);

// foreach($posts as $post) {
//     echo "<li>" . $post["title"] . "</li>";
// } 

// dd($posts);