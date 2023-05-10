<?php

if ( isset( $_GET[ 'stid' ] ) ) {

    $studentId = $_GET[ 'stid' ];
    $name = $_GET[ 'name' ];
    $BD = $_GET[ 'BD' ];
    $address = $_GET[ 'address' ];
    $phoneNumber = $_GET[ 'phoneNumber' ];
    $email = $_GET[ 'email' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    if ( $db->connect_error ) {
        echo 'false';
        exit();
    }

    $query = "UPDATE `students` SET `NAME_STUDENT`='$name',`BIRTHDATE`='$BD',`ADDRESS`='$address',`PHONE_NUMBER`=$phoneNumber,`Email`='$email' WHERE ST_ID=$studentId";
    $db->query( $query );
    $db->commit();
    $db->close();
    echo 'true';

}

?>