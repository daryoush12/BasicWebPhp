<?php
session_start();
require("../Classes/Task/Task.php");
use Classes\{Task as Task};
setlocale(LC_ALL, 'fin_FIN');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// define variables and set to empty values
$title = $startdate = $duedate = $priority = $status = $description = "";
$errors = array();

//TITLE VALIDATION RULES: characters, string and not longer than 16 characters.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] == "Add") {
  if (empty($_POST["title"])) {
    array_push($errors, "Title is required");
  if(!is_string($_POST["title"]))  
  array_push($errors, "Title cant contain anything other than letters!");
  if(!ctype_alpha($_POST["title"]))  
  array_push($errors, "Title can not contain numbers or special characters!");
  } else {
    $title = test_input($_POST["title"]);
  }
  //DATE VALIDATION RULES: Must be date, is not before current date and after duedate.
  if (empty($_POST["startdate"])) {
      array_push($errors,"Startdate is required");
  } else {
    $startdate = test_input($_POST["startdate"]);
     if((time()-(60*60*24)) > strtotime($startdate)){
        //CHECK if startdate is set before today if After then proceed:
         array_push($errors, "Start date cant be set before today!");
    }
  }
  if (empty($_POST["duedate"])) {
    array_push($errors,"Duedate is required");
  } else {
    $duedate = test_input($_POST["duedate"]);
    if((time()-(60*60*24)) > strtotime($duedate)){
        //CHECK if duedate is set before startdate or today if everything checks proceed:
        array_push($errors, "Duedate cant be set before today!");
    }
    if(strtotime($startdate) > strtotime($duedate)){
        array_push($errors, "Duedate cant be set before startdate");
    }
  }
//Must be number and validity check against priority table:
  if (empty($_POST["priority"])) {
     array_push($errors, "You have not selected priority!");
  if(!is_numeric($_POST["priority"])))
  array_push($errors, "Priority not number!");
  } else {
    $priority = test_input($_POST["priority"]);
  }
//Must be number + validity check against status table:
  if (empty($_POST["status"])) {
    array_push($errors,"You have not selected status!");
  if(!is_numeric($_POST["status"])))
    array_push($errors, "Status not number!");
  } else {
    $status = test_input($_POST["status"]);
  }
  //Not required if it is set maximum length is 200 characters:
    if (!empty($_POST["description"]) && mb_strlen($_POST["description"]) < 200) {
      array_push($errors, "Description cant be longer than 200 characters!");
  } else {
    $description = test_input($_POST["description"]);  
  }
  //Error count check:
  if(count($errors) == 0){
    //If input is verified create new task object for database query:
    $Task = new Task($title, $startdate, $duedate, $priority, $status, $description);
    echo $Task-> row_print();
    //header("Location: ../index.php", true, 200);
  }
  else {
    $result = serialize($errors);
    header("Location: ../NewTask.php?errors=$result", true, 301);
    exit();
  }
  /*
   * This is where we attempt to connect into database and execute queries:
   * If errors variable is empty or "" then we can proceed with database functions:
   * If errors were recovered then we will simply add errors into session variable and redirect into Form:
   */
  
  //Set errors in session management:
 // $_SESSION["errors"] = $errors;
  
  //Redirect back into Index with status message OK:
}
else {
  header("Location: ../index.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>