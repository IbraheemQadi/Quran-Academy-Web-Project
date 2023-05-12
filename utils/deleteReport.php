<?php

if ( isset( $_GET[ 'stid' ] ) && isset( $_GET[ 'INDIX' ] ) ) {

    $studentId = $_GET[ 'stid' ];
    $index = $_GET[ 'INDIX' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    // $query = "Delete FROM students where ST_ID = $studentId AND INDIX = $index ";
    $query = "DELETE FROM report WHERE `report`.`ST_ID` = $studentId AND `report`.`INDIX` = $index ";
    $db->query( $query );
    $db->commit();
    $db->close();

    echo 'true';

} else {

    echo 'failed';
}

?>