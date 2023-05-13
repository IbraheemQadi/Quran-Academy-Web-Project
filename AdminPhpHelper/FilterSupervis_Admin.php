<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php

session_start();

$db= new mysqli('localhost','root','','academy');


if(isset($_POST['input'])) {

    if (empty($_POST['input'])) {

        $sql = "SELECT supervisor.CENTER_NUMBER, supervisor.ID, supervisor.BIRTHDATE,  supervisor.PHONE_NUMBER,  supervisor.NAME_SUP, center.ADDREES
FROM supervisor
INNER JOIN center
ON supervisor.CENTER_NUMBER = center.NUMBER_CENTER;";

    }
    else{


        $input = $_POST['input'];

// Check for search query parameter
        $sql = "SELECT supervisor.CENTER_NUMBER, supervisor.ID, supervisor.BIRTHDATE,  supervisor.PHONE_NUMBER,  supervisor.NAME_SUP, center.ADDREES
FROM supervisor
INNER JOIN center
ON supervisor.CENTER_NUMBER = center.NUMBER_CENTER 
    WHERE supervisor.ID LIKE '%{$input}%' OR supervisor.BIRTHDATE LIKE '%{$input}%' OR center.ADDREES LIKE '%{$input}%' OR supervisor.PHONE_NUMBER LIKE '%{$input}%'OR supervisor.NAME_SUP LIKE '%{$input}%';  ";}



} else{   $sql = "SELECT supervisor.CENTER_NUMBER, supervisor.ID, supervisor.BIRTHDATE,  supervisor.PHONE_NUMBER,  supervisor.NAME_SUP, center.ADDREES
FROM supervisor
INNER JOIN center
ON supervisor.CENTER_NUMBER = center.NUMBER_CENTER";;}

$es = $db->query($sql);

for ($i=0 ; $i < $es->num_rows;$i++) {
    $rw = $es->fetch_assoc();

    echo "
        <tr>
         <td> <span class='status delivered'> $rw[ID] </span> </td>
        <td>$rw[NAME_SUP]</td>
        <td>  $rw[BIRTHDATE] </td>
          <td>  $rw[PHONE_NUMBER] </td>
         <td> $rw[ADDREES]  </td>
         
         
         </tr>";



    $db->close();
}

$db->close();
?>