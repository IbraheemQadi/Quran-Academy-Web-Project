<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php

session_start();

$db= new mysqli('localhost','root','','academy');


if(isset($_POST['input'])) {

    if (empty($_POST['input'])) {

        $sql = "SELECT s.ST_ID , s.NAME_STUDENT, r.DateFor, r.INDIX, r.MOMRIZE_Gread, r.Rev_grad, r.Rev_for, r.MOM_for, r.NameSoraMEMO, r.NameSoraREV
                    FROM students s JOIN report r ON s.ST_ID = r.ST_ID WHERE s.ST_SUP = {$_SESSION['ID']}  AND r.ST_ID IS NOT NULL;";
    }
    else{


        $input = $_POST['input'];
// Check for search query parameter
$sql = "SELECT s.ST_ID , s.NAME_STUDENT, r.DateFor, r.INDIX, r.MOMRIZE_Gread, r.Rev_grad, r.Rev_for, r.MOM_for, r.NameSoraMEMO, r.NameSoraREV
                    FROM students s JOIN report r ON s.ST_ID = r.ST_ID WHERE s.ST_SUP = {$_SESSION['ID']}  AND (r.ST_ID IS NOT NULL And s.NAME_STUDENT LIKE '%{$input}%'  OR r.MOM_for LIKE '%{$input}%' OR r.MOMRIZE_Gread LIKE '%{$input}%' OR r.Rev_for LIKE '%{$input}%' OR r.Rev_grad LIKE '%{$input}%'OR r.NameSoraMEMO LIKE '%{$input}%' OR r.NameSoraREV LIKE '%{$input}%'OR r.DateFor LIKE '%{$input}%') ;";


    }
} else{  $sql = "SELECT s.ST_ID , s.NAME_STUDENT, r.DateFor, r.INDIX, r.MOMRIZE_Gread, r.Rev_grad, r.Rev_for, r.MOM_for, r.NameSoraMEMO, r.NameSoraREV
                    FROM students s JOIN report r ON s.ST_ID = r.ST_ID WHERE s.ST_SUP = {$_SESSION['ID']}  AND r.ST_ID IS NOT NULL;";}
 $es = $db->query($sql);

for ($i=0 ; $i < $es->num_rows;$i++) {
    $rw = $es->fetch_assoc();

    echo "
    <tr id=$rw[INDIX] >
         <td>$rw[NAME_STUDENT]</td>
         <td><span class='status delivered'>$rw[DateFor]</span></td>
         <td>$rw[NameSoraMEMO]</td>
         <td>$rw[MOM_for]</td>
         <td>$rw[MOMRIZE_Gread]</td>
         <td>$rw[NameSoraREV]</td>
         <td>$rw[Rev_for]</td>
         <td>$rw[Rev_grad]</td>
         <td ><a onclick='addToStorage($rw[ST_ID]);addIndixToStorage($rw[INDIX]);' type='button' data-te-toggle='modal' data-te-target='#deleteReportModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a>
         <a onclick='addToStorage($rw[ST_ID]); addIndixToStorage($rw[INDIX]); setReportModalData($rw[ST_ID],$rw[INDIX]);' type='button' data-te-toggle='modal' data-te-target='#updateReportModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>
     </tr>";

}

$db->close();
?>