<?php

include_once 'Database.php';

$selectQuery = "SELECT * FROM books";

try {
    $statement = $conn->query($selectQuery);

    while ($row = $statement->fetch()) {
        echo "Name: " . $row['name'] . " - " . $row['description'] . "<br>";
    }
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
