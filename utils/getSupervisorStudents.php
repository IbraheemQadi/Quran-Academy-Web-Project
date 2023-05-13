<?php

if ( isset( $_GET[ 'spid' ] ) ) {

    session_start();

    $supervisorID = $_SESSION[ 'ID' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    if ( $db->connect_error ) {
        die( 'Connection failed ' . $db->connect_error );
    }

    $querystr = "SELECT * FROM students where ST_SUP=$supervisorID";
    $res = $db->query( $querystr );

    $students = array();

    while( $row = $res->fetch_assoc() ) {
        array_push( $students, $row );
    }

    echo json_encode( $students );
}
?>