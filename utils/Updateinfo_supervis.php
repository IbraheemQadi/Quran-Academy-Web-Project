<?php

session_start();
$flagPass = 0 ;

$flagInfo_name = 0 ;
$flagInfo_DB = 0 ;
$flagInfo_phone = 0 ;
$flagInfo_Address = 0 ;
$flagInfo_error = 0 ;

if(isset($_POST['NameStudent']) && isset($_POST['DB_student'])  && isset($_POST['Phone_number']) && isset($_POST['Address_student'])){

    if (!empty($_POST['NameStudent'])){
        $db= new mysqli('localhost','root','','academy');
        $max="UPDATE supervisor  SET NAME_SUP = '".$_POST['NameStudent']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_name = 1 ;
    }


    if (!empty($_POST['DB_student'])){
        $db= new mysqli('localhost','root','','academy');

        $max="UPDATE supervisor  SET BIRTHDATE = '".$_POST['DB_student']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_DB = 2 ;
    }

    if (!empty($_POST['Phone_number'])){
        $db= new mysqli('localhost','root','','academy');

        $max="UPDATE supervisor  SET PHONE_NUMBER = '".$_POST['Phone_number']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);
        $db->close();
        $flagInfo_phone = 3 ;
    }

    if(!empty($_POST['Address_student'])){
        $db= new mysqli('localhost','root','','academy');

        $max="UPDATE supervisor  SET ADDRESS = '".$_POST['Address_student']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_Address = 4 ;

    }
    if($flagInfo_Address == 0 && $flagInfo_phone == 0 && $flagInfo_DB ==0 && $flagInfo_name == 0 ){
        $flagInfo_error = 5 ;
    }
}




if($flagInfo_name == 1 ){


    echo "Name successfully changed\n";


}

if ($flagInfo_DB == 2 ){


    echo "DB successfully changed\n";



}
if ($flagInfo_phone == 3 ){
    echo "Phone_number successfully changed \n";

}

if ($flagInfo_Address == 4 ){
    echo "Address successfully changed\n";



}

if($flagInfo_error == 5) {


    echo "mistake! Make sure to enter all data\n" ;


}
