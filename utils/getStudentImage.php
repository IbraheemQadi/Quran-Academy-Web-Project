<?php
if ( isset( $_GET[ 'stid' ] ) ) {

    $stid = $_GET[ 'stid' ];
    $query = "SELECT `imgPath` FROM `students` WHERE ST_ID=$stid";
    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    $res = $db->query( $query );
    $row = $res->fetch_assoc();
    echo $row[ 'imgPath' ];
    $db->commit();
    $db->close();
}
?>