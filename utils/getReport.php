<?php

if ( isset( $_GET[ 'stid' ] ) && isset( $_GET[ 'INDIX' ] ) ) {

    $studentId = $_GET[ 'stid' ];
    $index = $_GET[ 'INDIX' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $query = "SELECT * FROM `report` WHERE INDIX=$index AND ST_ID=$studentId";
    $res = $db->query( $query );
    $report = $res->fetch_assoc();

    echo json_encode( $report );
    $db->close();
}

?>