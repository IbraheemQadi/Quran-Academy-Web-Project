<?php

if ( isset( $_GET[ 'spid' ] ) ) {

    $spid = $_GET[ 'spid' ];
    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $query = "SELECT * FROM `supervisor` WHERE ID=$spid";
    $res = $db->query( $query );
    $supervisor = $res->fetch_assoc();

    echo json_encode( $supervisor );
    $db->close();
}

?>