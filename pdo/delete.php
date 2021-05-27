<?php

include_once 'Database.php';
/*
$deleteQuery = "DELETE FROM books WHERE id = 1";

try {
    $result = $conn->exec($deleteQuery);
    echo "$result record deleted<br>";
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
*/


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $deleteQuery = "DELETE FROM tasks WHERE id = :id";
        $statement = $conn->prepare($deleteQuery);
        $statement->execute(array(":id" => $id));
        if ($statement) {
            echo "Task deleted successfully";
        }
    } catch (PDOException $ex) {
        echo "An error Occurred" . $ex->getMessage();
    }
}
