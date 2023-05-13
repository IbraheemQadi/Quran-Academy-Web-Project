<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
session_start();
   $flagPass= 0 ;


   if(isset($_POST['oldPass']) && isset($_POST['newPass'])  ){

       if (!empty($_POST['oldPass']) || !empty($_POST['newPass'])){

           $db= new mysqli('localhost','root','','academy');



           $max="SELECT   PASS FROM students where ST_ID = '". $_SESSION['ID'] ."' ;";
           $res = $db->query($max);

           $rw = $res->fetch_assoc();

           $oldPassword = $rw['PASS'];

           if ($oldPassword == $_POST['oldPass']){

               $max="UPDATE students  SET PASS = '".$_POST['newPass']."'  WHERE ST_ID = '". $_SESSION['ID'] ."' ;";
               $res = $db->query($max);
               $flagPass  = 3; //update


           } else{
               $flagPass = 2 ; //  error oldPassword





           }


       } else{$flagPass = 1 ; }

   }








              if($flagPass == 1 ){


                 echo "<p style='color: red' >mistake! Make sure to enter all data </p>";

              }

              elseif ($flagPass == 2 ){


                 echo "<p style=color: red; > The old password is wrong!</p>";



              }
              elseif ($flagPass == 3 ){


                echo " <p style='color: green'>Password successfully changed </p>" ;


              }




