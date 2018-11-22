<?php

include("db.php");

require("./Classes/Task/Task.php");
use Classes\{Task as Task};

function callfortasks(){
    // Create connection
    
    try { 
    $conn = @ConnectionOpen();
    print("conn: ".$conn);
    $sql = "SELECT task_id, title, start_date,due_date,status,priority, description FROM tasks";
    $result = $conn->query($sql) or die($conn->error);
    if ($result->num_rows === 0) {
    // if database returns 0 fields.
    return "0 entries were found";
    } else {
    $ArrayObjectList = []; 
    // output data of each row
    while($row = $result->fetch_assoc()) {
      //  $Task = new Task($row["id"], $row["taskname"], $row["description"], $row["deadline"]);
        array_push($ArrayObjectList,  new Task(
        $row["title"], 
        $row["start_date"], 
        $row["due_date"],
        $row["status"],
        $row["priority"],
        $row["description"]));
    }
    $conn->close();
    return $ArrayObjectList;
}
}catch(Exception $e){
    Print(' <div class="alert alert-danger">'.$e.'</div>');
}
}

