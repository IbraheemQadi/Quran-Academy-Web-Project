<?php

if ( isset( $_GET[ 'stid' ] ) ) {

    $stid = $_GET[ 'stid' ];

    $memSora = $_GET[ 'memSora' ];
    $memRange = $_GET[ 'memRange' ];
    $memGrade = $_GET[ 'memGrade' ];

    $revSora = $_GET[ 'revSora' ];
    $revRange = $_GET[ 'revRange' ];
    $revGrade = $_GET[ 'revGrade' ];

    $date = $_GET[ 'date' ];

    $db = new mysqli( 'localhost', 'root', '', 'academy' );
    if ( $db->connect_error ) {
        echo 'false';
        exit();
    }

    $query = "INSERT INTO `report`(`ST_ID`, `NameSoraMEMO`, `MOM_for`, `MOMRIZE_Gread`, `NameSoraREV`, `Rev_for`, `Rev_grad`, `DateFor`) VALUES 
    ($stid,'$memSora','$memRange',$memGrade,'$revSora','$revRange',$revGrade,'$date')";

    $db->query( $query );
    echo $db->insert_id;
    $db->commit();
    $db->close();

}

?>