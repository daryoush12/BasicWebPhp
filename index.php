<?php

session_start();


//Inlcude database functionalities:
include("db/db_access_tasks.php");
//Set page title:
$pagename = "Home";
?>
<!DOCTYPE html > 
<html lang="en"> 
    <?php include("layers/header.php"); ?>
    <body> 
        <?php include("layers/navi.php"); ?>
        
        <div class="container-fluid">
        <br>
        <?php $entries = callfortasks(); ?>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">title</th>
                        <th scope="col">startdate</th>
                        <th scope="col">duedate</th>
                        <th scope="col">priority</th>
                        <th scope="col">status</th>
                        <th scope="col">description</th>
                        <th scope ="col">#</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                     //Execute connection check and query for data:
               
                    
                    //Loops through each task in results: Returns a message if empty:
                    //TODO: check if string or array and execute logic based on it.
                    if(!empty($entries)){
                    foreach ($entries as $tasks) {
                        print($tasks->RowPrint());
                    }
                    }else {
                      //We wont print anything if entries is empty.
                }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include("layers/footer.php"); ?>
    </body> 
</html>