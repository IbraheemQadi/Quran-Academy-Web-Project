<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php

session_start();

$db= new mysqli('localhost','root','','academy');


if(isset($_POST['input'])) {

    if (empty($_POST['input'])) {

        $sql = "SELECT `ADDREES`, `NUMBER_CENTER`, `WORKING_DAYS` FROM center;";

    }
    else {


        $input = $_POST['input'];

        $sql = "SELECT ADDREES, NUMBER_CENTER, WORKING_DAYS FROM center where ADDREES LIKE '%{$input}%' OR   WORKING_DAYS LIKE '%{$input}%' OR  NUMBER_CENTER LIKE '%{$input}%'   ;";;
// Check for search query parameter
    }


} else{    $sql = "SELECT ADDREES, NUMBER_CENTER, WORKING_DAYS FROM center   ;";;}

$es = $db->query($sql);

for ($i=0 ; $i < $es->num_rows;$i++) {
    $rw = $es->fetch_assoc();

    echo "
        <tr>
         <td> <span class='status delivered'> $rw[NUMBER_CENTER] </span> </td>
        <td>$rw[WORKING_DAYS]</td>
        <td>  $rw[ADDREES] </td>
      
         
         </tr>";



    $db->close();
}

$db->close();
?>