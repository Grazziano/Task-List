<?php

include_once 'Database.php';

// $insertQuery = "INSERT INTO books(name, description, created_at)
//                 VALUES('Introduction to Java', 'Learn all about Java', now())";

// $insertQuery2 = "INSERT INTO books(name, description, created_at)
//                 VALUES('Introduction to PHP', 'Learn all about PHP', now())";

$name = "PHP PDO";
$description = "Build a basic task list";

try {
    //build the query
    $insertQuery = "INSERT INTO books (name, description, created_at)
                VALUES (?, ?, now())";

    //prepared the query
    $statement = $conn->prepare($insertQuery);
    //execute the statement
    $statement->execute(array($name, $description));

    echo "Record Created";

    // $result = $conn->exec($insertQuery);
    // echo "$result record inserted<br>";

    // $result = $conn->exec($insertQuery2);
    // echo "$result record inserted<br>";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
