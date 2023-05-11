<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<?php

session_start();


$db= new mysqli('localhost','root','','academy');
$supervisorID=$_SESSION['ID'];

if(isset($_POST['input'])) {

if (empty($_POST['input'])) {

    $sql = "SELECT DateFor,MOMRIZE_Gread,Rev_grad,Rev_for,MOM_for,NameSoraMEMO,NameSoraREV FROM report WHERE ST_ID = '" . $_SESSION['ID'] . "' ;";
}
else{


    $input = $_POST['input'];
// Check for search query parameter

        $sql = "SELECT DateFor,MOMRIZE_Gread,Rev_grad,Rev_for,MOM_for,NameSoraMEMO,NameSoraREV FROM report WHERE ST_ID = '" . $_SESSION['ID'] . "' AND (MOM_for LIKE '%{$input}%' OR MOMRIZE_Gread LIKE '%{$input}%' OR Rev_for LIKE '%{$input}%' OR Rev_grad LIKE '%{$input}%'OR NameSoraMEMO LIKE '%{$input}%' OR NameSoraREV LIKE '%{$input}%'OR DateFor LIKE '%{$input}%');";
}
} else{ $sql = "SELECT DateFor,MOMRIZE_Gread,Rev_grad,Rev_for,MOM_for,NameSoraMEMO,NameSoraREV FROM report WHERE ST_ID = '" . $_SESSION['ID'] . "' ;";}

$res = $db->query($sql);


for ($i=0 ; $i < $res->num_rows;$i++) {
$rw = $res->fetch_assoc();

    echo "
        <tr>
        <td><span class='status delivered'>$rw[DateFor] </span></td>;
        <td> $rw[NameSoraMEMO]  </td>
          <td>  $rw[MOM_for] </td>
         <td> $rw[MOMRIZE_Gread]  </td>
         <td>  $rw[NameSoraREV] </td>
         <td> $rw[Rev_for] </td>
         <td>  $rw[Rev_grad] </td>
         </tr>";

}




    $db->close();
?>