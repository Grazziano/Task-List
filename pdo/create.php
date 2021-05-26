<?php

include_once 'Database.php';
/*
$insertQuery = "INSERT INTO books(name, description, created_at)
                VALUES('Introduction to Java', 'Learn all about Java', now())";

$insertQuery2 = "INSERT INTO books(name, description, created_at)
                VALUES('Introduction to PHP', 'Learn all about PHP', now())";

try {
    $result = $conn->exec($insertQuery);
    echo "$result record inserted<br>";

    $result = $conn->exec($insertQuery2);
    echo "$result record inserted<br>";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
*/

/*
try {
    //build the query
    $insertQuery = "INSERT INTO books (name, description, created_at)
                VALUES (:book_name, :book_description, now())";

    //prepared the query
    $statement = $conn->prepare($insertQuery);

    $statement->bindParam(":book_name", $name);
    $statement->bindParam(":book_description", $description);

    $name = "Objects and Patterns 4";
    $description = "Software crafting";
    $statement->execute();

    $name = "Objects and Patterns 5";
    $description = "Software crafting";
    $statement->execute();

    // echo "Record Created";
    echo "Record with ID: " . $conn->lastInsertId() . " created";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
*/

if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    try {
        $createQuery = "INSERT INTO tasks (name, description, created_at)
                VALUES (:book_name, :book_description, now())";
        $statement = $conn->prepare($createQuery);
        $statement->execute(array(":book_name" => $name, ":book_description" => $description));
        if ($statement) {
            echo "Record Inserted";
        }
    } catch (PDOException $ex) {
        echo "An error Occurred" . $ex->getMessage();
    }
}
