<?php

if ( isset( $_GET[ 'stid' ] ) ) {

    $studentId = $_GET[ 'stid' ];
    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $query = "SELECT * FROM `students` WHERE ST_ID=$studentId";
    $res = $db->query( $query );
    $student = $res->fetch_assoc();

    echo json_encode( $student );
    $db->close();
}

?>