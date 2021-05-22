<?php

include_once 'Database.php';

try {
    //build the query
    $insertQuery = "INSERT INTO books (name, description, created_at)
                VALUES (:book_name, :book_description, now())";

    //prepared the query
    $statement = $conn->prepare($insertQuery);
    
    $statement->bindParam(":book_name", $name);
    $statement->bindParam(":book_description", $description);

    $name = "Objects and Patterns 2";
    $description = "Software crafting";
    $statement->execute();

    $name = "Objects and Patterns 3";
    $description = "Software crafting";
    $statement->execute();

    echo "Record Created";

} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
