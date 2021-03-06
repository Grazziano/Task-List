<?php

use voku\helper\Paginator;

require __DIR__ . '/vendor/autoload.php';

include_once 'Database.php';
// include_once 'Book.php';

$selectQuery = "SELECT * FROM books";

try {
    // $statement = $conn->query($selectQuery);

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

    // $statement->setFetchMode(PDO::FETCH_CLASS, "Book");

    // while ($row = $statement->fetch()) {
    //     echo "Name: " . $row->name . " - " . $row->description . "<br>";
    //     var_dump($row);
    // }

    $paginate = new Paginator(2, 'p');
    $readQuery = "SELECT * FROM tasks";
    $statement = $conn->query($readQuery);
    $total = $statement->rowCount();
    $paginate->set_total($total);

    $tasks = $conn->query("SELECT * FROM tasks" . $paginate->get_limit());

    // while ($task = $statement->fetch(PDO::FETCH_OBJ)) {
    //     $create_date = strftime("%b %d %Y", strtotime($task->created_at));
    //     $output = "<tr>
    //     <td title='Click to edit'>
    //         <div class='editable' onClick=\"makeElementEditable(this)\" onblur=\"updateTask(this, '{$task->id}', 'name')\">$task->name</div>
    //     </td>
    //     <td title='Click to edit'>
    //         <div class='editable' onClick=\"makeElementEditable(this)\" onblur=\"updateTask(this, '{$task->id}', 'description')\"> $task->description </div>
    //     </td>
    //     <td title='Click to edit'>
    //         <div class='editable' onClick=\"makeElementEditable(this)\" onblur=\"updateTask(this, '{$task->id}', 'status')\">$task->status</div>
    //     </td>
    //     <td>$create_date</td>
    //     <td style='width: 5%;'>
    //     <button onClick=\"deleteTask('{$task->id}')\"><i class='btn-danger fa fa-times'></i></button>
    //     </td>
    // </tr>";

    //     echo $output;
    // }
} catch (PDOException $ex) {
    echo "An error occurred " . $ex->getMessage();
}
