<?php
include_once dirname( __FILE__ ) . '/../../../../objects/managers/FileManager.php';

/**
 * @return File
 */
function initFileObject() {
    $sId = null;
    if ( isset( $_GET[ 'id' ] ) ) {
        $sId = $_GET[ 'id' ];
    };

    $sContent = null;
    if ( isset( $_FILES[ 'file' ][ 'tmp_name' ] ) ) {
        $sContent = file_get_contents( $_FILES[ 'file' ][ 'tmp_name' ] );
    };
    return new File( array(
        'id' => $sId,
        'content' => $sContent
    ) );
}

$oFile = initFileObject();

$sHTTPVerb = $_SERVER[ 'REQUEST_METHOD' ];
$oFileManager = new FileManager( $oFile );
try {
    switch ( $sHTTPVerb ) {
        case 'POST':
            $sNewId = $oFileManager->create();
            _success( array( 'id' => $sNewId ) );
            break;
    }
} catch ( Exception $e ) {
    _failed( $e );
}

//
//$oFileManager = new FileManager( array( 'file' => $oFile ) );
//
//$sId = $oFileManager->create();

echo $sHTTPVerb;

function _success( $aResponse ) {
    http_response_code( 200 );

    $aJsonReturn = array_merge( array(
        'success' => true
    ), $aResponse );
    echo json_encode( $aJsonReturn );
}

function _failed( Exception $oException ) {
    http_response_code( 500 );

    $sMessage = $oException->getMessage();

    $aJsonReturn = array(
        'success' => false,
        'message' => $sMessage
    );
    echo json_encode( $aJsonReturn );
}