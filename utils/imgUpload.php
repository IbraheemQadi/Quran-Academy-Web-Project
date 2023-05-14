<?php
if ( $_FILES[ 'photo' ][ 'error' ] === UPLOAD_ERR_OK ) {
    if ( isset( $_GET[ 'spid' ] ) ) {

        $spid = $_GET[ 'spid' ];
        $tempFilePath = $_FILES[ 'photo' ][ 'tmp_name' ];
        $destinationPath = '../img/profile/'. $_FILES[ 'photo' ][ 'name' ];

        // Move the uploaded file to the desired destination
        move_uploaded_file( $tempFilePath, $destinationPath );

        // save the img in the database
        $imgpath = 'img/profile/'.$_FILES[ 'photo' ][ 'name' ];
        $query = "UPDATE `supervisor` SET `imgPath`='$imgpath' WHERE ID=$spid";
        $db = new mysqli( 'localhost', 'root', '', 'academy' );
        $db->query( $query );
        $db->commit();
        $db->close();

        echo 'true';
    }
} else {
    echo 'Error uploading file.';
}
?>