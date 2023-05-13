<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php

session_start();

$db= new mysqli('localhost','root','','academy');


if(isset($_POST['input'])) {

    if (empty($_POST['input'])) {

        $sql = "SELECT s.NAME_STUDENT, s.BIRTHDATE, s.ADDRESS, s.PHONE_NUMBER, s.PASS, s.ST_ID, s.ST_SUP, s.CENTER_NUMBER, s.Email, sv.NAME_SUP, c.ADDREES FROM 
                students s INNER JOIN supervisor sv ON s.ST_SUP = sv.ID INNER JOIN center c ON s.CENTER_NUMBER = c.NUMBER_CENTER;";

    }
    else{


        $input = $_POST['input'];

// Check for search query parameter
  $sql = "SELECT s.NAME_STUDENT, s.BIRTHDATE, s.ADDRESS, s.PHONE_NUMBER, s.PASS, s.ST_ID, s.ST_SUP, s.CENTER_NUMBER, s.Email, sv.NAME_SUP, c.ADDREES FROM students s  INNER JOIN supervisor sv ON s.ST_SUP = sv.ID INNER JOIN center c ON s.CENTER_NUMBER = c.NUMBER_CENTER  
          WHERE NAME_STUDENT LIKE '%{$input}%' OR s.BIRTHDATE LIKE '%{$input}%' OR c.ADDREES LIKE '%{$input}%' OR s.PHONE_NUMBER LIKE '%{$input}%'OR s.ST_ID LIKE '%{$input}%';  ";}



} else{   $sql = "SELECT s.NAME_STUDENT, s.BIRTHDATE, s.ADDRESS, s.PHONE_NUMBER, s.PASS, s.ST_ID, s.ST_SUP, s.CENTER_NUMBER, s.Email, sv.NAME_SUP, c.ADDREES FROM students s INNER JOIN supervisor sv ON s.ST_SUP = sv.ID INNER JOIN center c ON s.CENTER_NUMBER = c.NUMBER_CENTER;";;}

  $es = $db->query($sql);

                    for ($i=0 ; $i < $es->num_rows;$i++) {
                        $rw = $es->fetch_assoc();

                        echo "
        <tr>
         <td> <span class='status delivered'> $rw[ST_ID] </span> </td>
        <td>$rw[NAME_STUDENT]</td>
        <td>  $rw[BIRTHDATE] </td>
          <td>  $rw[PHONE_NUMBER] </td>
         <td> $rw[ADDREES]  </td>
         <td> $rw[NAME_SUP]  </td>
         
         </tr>";



                    $db->close();
}

$db->close();
?>