<?php

$db= new mysqli('localhost','root','','academy');



$combo = "SELECT ID , NAME_SUP  FROM supervisor WHERE CENTER_NUMBER = '".$_GET['SelectMr']."'; ";
$res = $db->query($combo);


for ($i = 0 ; $i< $res->num_rows;$i++){
    $rw = $res->fetch_assoc();
    echo "<option value='".$rw['ID']."'>".$rw['NAME_SUP']."</option>";

}

$db->close();


?>
