<?php

if ( isset( $_GET[ 'id' ] ) && isset( $_GET[ 'password' ] ) ) {
    session_start();

    $supervisorID = $_GET[ 'id' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );

    $query = "SELECT PASS FROM supervisor where ID = $supervisorID ";

    $res = $db->query( $query );
    $row = $res->fetch_assoc();

    if ( $row != null ) {
        if ( $row[ 'PASS' ] === $_GET[ 'password' ] ) {
            echo 'true';
            exit;
        } else {
            echo 'false';
            exit;
        }

    } else {
        echo 'false';
        exit;
    }

}

?>