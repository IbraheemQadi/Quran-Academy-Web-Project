<?php
if ( isset( $_GET[ 'spid' ] ) ) {

    $spid = $_GET[ 'spid' ];
    $query = "SELECT `imgPath` FROM `supervisor` WHERE ID=$spid";
    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $res = $db->query( $query );
    $row = $res->fetch_assoc();
    echo $row[ 'imgPath' ];
    $db->commit();
    $db->close();
}
?>