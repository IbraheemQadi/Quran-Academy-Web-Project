<?php

if ( isset( $_GET[ 'stid' ] ) && isset( $_GET[ 'INDIX' ] ) ) {

    $stid = $_GET[ 'stid' ];
    $indix = $_GET[ 'INDIX' ];

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

    $query = "UPDATE `report` SET 
    `NameSoraMEMO`='$memSora',`MOM_for`='$memRange',`MOMRIZE_Gread`=$memGrade,
    `NameSoraREV`='$revSora',`Rev_for`='$revRange',`Rev_grad`=$revGrade,
    `DateFor`='$date' WHERE ST_ID=$stid AND INDIX=$indix";

    $db->query( $query );
    $db->commit();
    $db->close();
    echo 'true';

}

?>