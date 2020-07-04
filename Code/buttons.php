<?php

include "dbConn.php";
header("refresh:5;url=u.php");


//[name]
if(isset($_POST['save']))

{

     $rightnum = $_POST["rbutton"];
     $forwardnum = $_POST["fbutton"];
     $leftnum = $_POST["lbutton"];

     if ($rightnum == "") {
         $rightnum = "NULL";
     }

     if ($forwardnum == "") {
         $forwardnum = "NULL";
     }

     if ($leftnum == "") {
         $leftnum = "NULL";
     }


     $query = "INSERT INTO map (rbutton , fbutton , lbutton)
      VALUES (".$rightnum.", ".$forwardnum.", ".$leftnum.")";

    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        echo  "Data Saved";
    }
    else
    {
      echo "Data not Saved";
    }




}

   if(isset($_POST['delete'])){

  $query = "DELETE FROM map ORDER BY id DESC LIMIT 1";

  $query_run = mysqli_query($db, $query);

  if($query_run)
  {
      echo  "Data Deleted";
  }
  else
  {
    echo "Data not Deleted";
  }
}




?>
