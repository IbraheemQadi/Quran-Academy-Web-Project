<?php

if ( isset( $_GET[ 'stid' ] ) ) {

    $studentId = $_GET[ 'stid' ];
    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $query = "Delete FROM students where ST_ID = $studentId ";
    $db->query( $query );
    $db->commit();
    $db->close();

    echo $studentId;

} else {

    echo 'failed';
}

?>