<?php
include_once 'Database.php';

try {
    // echo $result = $conn->exec("ALTER TABLE books ENGINE = InnoDB");
    // $statement = $conn->query("SHOW TABLE STATUS FROM library");
    $name = "My Book";
    $description = "My book description";

    //begin a transaction
    $conn->beginTransaction();

    $sql1 = "INSERT INTO books (name, description, created_at)
                VALUES (:book_name, :book_description, now())";

    $statement = $conn->prepare($sql1);
    $statement->execute(array(
        ":book_name" => $name,
        ":book_description" => $description,
    ));

    if($statement) {
        echo "record inserted<br>";
    }

    $sql2 = "DELETE FROM books WHERE id = :id";
    $statement = $conn->prepare($sql2);

    $statement->execute(array(":id" => 14));

    $conn->commit();


    // var_dump($statement->fetch());
} catch (PDOException $ex) {
    $conn->rollBack();
    echo "An error occurred " . $ex->getMessage();
}
