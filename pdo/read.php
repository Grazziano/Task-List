<?php

include_once 'Database.php';
include_once 'Book.php';

$selectQuery = "SELECT * FROM books";

try {
    $statement = $conn->query($selectQuery);

    // while ($row = $statement->fetch()) {
    //     echo "Name: " . $row['name'] . " - " . $row['description'] . "<br>";
    // }

    // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    //     echo "Name: " . $row['name'] . " - " . $row['description'] . "<br>";
    //     var_dump($row);
    // }

    // while ($row = $statement->fetch(PDO::FETCH_NUM)) {
    //     echo "Name: " . $row[1] . " - " . $row[2] . "<br>";
    //     var_dump($row);
    // }

    // $statement->setFetchMode(PDO::FETCH_OBJ);

    // while ($row = $statement->fetch()) {
    //     echo "Name: " . $row->name . " - " . $row->description . "<br>";
    //     var_dump($row);
    // }

    $statement->setFetchMode(PDO::FETCH_CLASS, "Book");

    while ($row = $statement->fetch()) {
        echo "Name: " . $row->name . " - " . $row->description . "<br>";
        var_dump($row);
    }
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
