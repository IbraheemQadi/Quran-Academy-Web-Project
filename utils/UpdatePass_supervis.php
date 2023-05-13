<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
$flagPass = 0 ;

$flagInfo_name = 0 ;
$flagInfo_DB = 0 ;
$flagInfo_phone = 0 ;
$flagInfo_Address = 0 ;
$flagInfo_error = 0 ;

if(isset($_POST['oldPass']) && isset($_POST['newPass'])  ){

    if (!empty($_POST['oldPass']) || !empty($_POST['newPass'])){

        $db= new mysqli('localhost','root','','academy');

        $max="SELECT   PASS FROM supervisor where ID = '". $_SESSION['ID'] ."' ;";
        $res = $db->query($max);

        $rw = $res->fetch_assoc();

        $oldPassword = $rw['PASS'];

        if ($oldPassword == $_POST['oldPass']){
            $max="UPDATE supervisor  SET PASS = '".$_POST['newPass']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";
            $res = $db->query($max);
            $flagPass  = 3; //update

        } else{
            $flagPass = 2 ; //  error oldPassword
        }
    } else{$flagPass = 1 ; }

}


if($flagPass == 1 ){


    echo "<p style='color: red'>mistake! Make sure to enter all data </p>";

}

elseif ($flagPass == 2 ){


    echo "<p style='color: red' > The old password is wrong!</p>";



}
elseif ($flagPass == 3 ){


    echo " <p style='color: green'>Password successfully changed </p>" ;


}
