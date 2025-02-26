<?php

require "functions.php";

require "Database.php";

require "Response.php";

require "router.php";

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