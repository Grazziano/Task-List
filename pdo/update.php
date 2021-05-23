<?php

include_once 'Database.php';

/*
$updateQuery = "UPDATE books SET name = 'Introduction to JAVA 2' WHERE id = 1";

try {
    $result = $conn->exec($updateQuery);
    echo "$result record updated<br>";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
*/

$updateQuery = "UPDATE books
                SET name = :book_name, description = :book_desc
                WHERE id = :id";
try {
    $statement = $conn->prepare($updateQuery);

    $statement->execute(array(
        ":book_name" => "Python for newbies",
        ":book_desc" => "Introduction to software development",
        ":id" => 15
    ));

    echo $statement->rowCount() . " record updated";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
