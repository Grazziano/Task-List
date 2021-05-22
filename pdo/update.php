<?php

include_once 'Database.php';

$updateQuery = "UPDATE books SET name = 'Introduction to JAVA 2' WHERE id = 1";

try {
    $result = $conn->exec($updateQuery);
    echo "$result record updated<br>";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
