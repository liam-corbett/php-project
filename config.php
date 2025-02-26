<?php

return [
    "database" => [
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "myapp",
        "charset" => "utf8mb4",
    ],

    "services" => [
        "mail" => [
            "host" => "smtp.mailtrap.io",
            "port" => "2525",
            "token" => "yourusername",
            "secret" => "yourpassword",
        ],
    ],
];