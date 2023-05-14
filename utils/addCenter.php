<?php

if ( isset( $_GET[ 'address' ] ) ) {

    if ( !empty( $_GET[ 'address' ] ) ) {
        $address = $_GET[ 'address' ];
        $workingDays = $_GET[ 'workingDays' ];

        $db = new mysqli( 'localhost', 'root', '', 'academy' );
        if ( $db->connect_error ) {
            echo 'false';
            exit();
        }

        $query1 = 'SELECT MAX(NUMBER_CENTER) AS max_value FROM center';
        $res = $db->query( $query1 );
        $row = $res->fetch_assoc();
        $index = $row[ 'max_value' ] + 1;

        $query2 = "INSERT INTO `center`(`NUMBER_CENTER`, `ADDREES`, `WORKING_DAYS`) 
    VALUES ($index,'$address','$workingDays')";
        $db->query( $query2 );
        echo $index;
        $db->commit();
        $db->close();
    } else echo 'false';
} else {
    echo 'false';
}

?>