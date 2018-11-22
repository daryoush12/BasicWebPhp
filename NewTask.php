<?php
session_start();
//Inlcude database functionalities:
include("db/db_access_tasks.php");
//Set page title:
$pagename = "Add task";
//Execute connection check and query for data:
?>
<!DOCTYPE html > 
<html lang="en"> 
    <?php include("layers/header.php"); ?>
    <body> 
        <?php include("layers/navi.php"); ?>


        <div class="container-fluid">
            
            <form action="Actions/NewEntry.php" method="post" name ="addentry" >
                <br>

                <?php
                $entries = callfortasks();
                $resulterr =  @unserialize($_GET["errors"]);
                if(!empty($resulterr)){
                foreach($resulterr as $error){
                    print('<div class="alert error alert-danger">' . $error . '</div>');
                }
                }
        ?>
                <p>* REQUIRED</p>
            <br>
                <label for = "title">Title </label><input id = "title" type = "text" name = "title"/>*
                <br>
                <label for = "startdate">Start date </label>      <input  id = "startdate" type = "date" name = "startdate"/>*
                <br>
           
                <label for = "duedate">Due date </label>    <input id = "duedate" type = "date" name = "duedate"/>*
                <br>

                <label for = "priority" >Priority </label>  <select id = "priority" name="priority">
                    <option value="" disabled selected>Select your option</option>
                    <option value="1">HIGH</option>
                    <option value="2">MEDIUM</option>
                    <option value="3">LOW</option>
                </select>*
                <br>

                <label for = "status">Status </label>  <select id = "status" name="status" >
                    <option value="" disabled selected>Select your option</option>
                    <option value="1">Done</option>
                    <option value="2">Under Work</option>
                    <option value="3">Ready</option>
                </select>*
                <br>
                <label for = "title">Description (Min. 200 characters) </label><br><textarea id="description" name="description" cols="40" rows="5"></textarea>
                <br>
                <input class="btn btn-success" name ="submit"  type = "submit" value = "Add">
                <input class="btn btn-success" name = "submit" type = "submit" value = "Cancel">
            </form>
</div>
<?php include("layers/footer.php"); ?>
</body> 
</html>