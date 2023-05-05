<?php
session_start();

if ($_SESSION['isStudent'] == 1 ) {

    $_SESSION['isStudent'] = 0;



}
elseif ($_SESSION['isAdmin'] == 1){

    $_SESSION['isAdmin'] = 0;

}
else{


    $_SESSION['isSupervis'] = 0;



}



