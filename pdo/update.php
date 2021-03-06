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

/*
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
*/

// if (isset($_POST['name']) && isset($_POST['id'])) {
if (isset($_POST['id'])) {
    // $name = trim($_POST['name']);
    $column = trim($_POST['column']);
    $theData = trim($_POST['theData']);
    $id = $_POST['id'];

    try {
        // $updateQuery = "UPDATE tasks SET name = :task_name WHERE id = :id";
        $updateQuery = "UPDATE tasks SET {$column} = :placeholder WHERE id = :id";

        $statement = $conn->prepare($updateQuery);
        // $statement->execute(array(":task_name" => $name, ":id" => $id));
        $statement->execute(array(":placeholder" => $theData, ":id" => $id));

        if ($statement->rowCount() === 1) {
            // echo "Task Name update successfully";
            echo "Task {$column} update successfully";
        } else {
            echo "No changes made";
        }
    } catch (PDOException $ex) {
        echo "An error Occurred" . $ex->getMessage();
    }
} /*else if (isset($_POST['description']) && isset($_POST['id'])) {
    $description = trim($_POST['description']);
    $id = $_POST['id'];

    try {
        $updateQuery = "UPDATE tasks SET description = :task_description WHERE id = :id";

        $statement = $conn->prepare($updateQuery);
        $statement->execute(array(":task_description" => $description, ":id" => $id));

        if ($statement->rowCount() === 1) {
            echo "Task description update successfully";
        } else {
            echo "No changes made";
        }
    } catch (PDOException $ex) {
        echo "An error Occurred" . $ex->getMessage();
    }
} else if (isset($_POST['status']) && isset($_POST['id'])) {
    $status = trim($_POST['status']);
    $id = $_POST['id'];

    try {
        $updateQuery = "UPDATE tasks SET status = :task_status WHERE id = :id";

        $statement = $conn->prepare($updateQuery);
        $statement->execute(array(":task_status" => $status, ":id" => $id));

        if ($statement->rowCount() === 1) {
            echo "Task status update successfully";
        } else {
            echo "No changes made";
        }
    } catch (PDOException $ex) {
        echo "An error Occurred" . $ex->getMessage();
    }
}
*/