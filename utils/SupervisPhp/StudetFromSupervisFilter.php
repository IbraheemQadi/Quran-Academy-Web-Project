<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../../js/SupervisorJs.js"></script>

<?php

session_start();

$db= new mysqli('localhost','root','','academy');


if(isset($_POST['input'])) {

    if (empty($_POST['input'])) {

        $sql = "SELECT * FROM students where ST_SUP='". $_SESSION['ID'] . "' ;";
    }
    else{


        $input = $_POST['input'];
// Check for search query parameter

        $sql = "SELECT * FROM students where ST_SUP='". $_SESSION['ID'] . "' AND (NAME_STUDENT LIKE '%{$input}%' OR BIRTHDATE LIKE '%{$input}%' OR ADDRESS LIKE '%{$input}%' OR PHONE_NUMBER LIKE '%{$input}%'OR ST_ID LIKE '%{$input}%' OR Email LIKE '%{$input}%') ;";    }
} else{    $sql = "SELECT * FROM students where ST_SUP='". $_SESSION['ID'] . "' ;";}

$res = $db->query($sql);

for ($i=0 ; $i < $res->num_rows;$i++) {
    $row = $res->fetch_assoc();

    echo "

                <tr id=$row[ST_ID]>
                    <td>$row[ST_ID]</td>
                    <td>$row[NAME_STUDENT]</td>
                    <td ><span class='status delivered'>$row[BIRTHDATE]</span></td>
                    <td>$row[ADDRESS]</td>
                    <td>$row[PHONE_NUMBER]</td>
                    <td >$row[Email]</td>
                    <td ><a onclick='addToStorage($row[ST_ID])' type='button' data-te-toggle='modal' data-te-target='#DeleteStudentModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a></td>
                    <td ><a onclick='addToStorage($row[ST_ID]); setModalData($row[ST_ID]);' type='button' data-te-toggle='modal' data-te-target='#updateStudentModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>
                </tr>";

}




$db->close();
?>