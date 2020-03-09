<?php
include_once dirname( __FILE__ ) . '/../File.php';

class FileManager {


    public function create( $sContent ) {

    }

    public function delete( $sId ) {

    }

    public function get( $sId ) {

    }

    public function getAll( $iLimit = '20', $iPage = 1 ) {

    }

    private function _createUniqId() {
        return uniqid( 'file_' );
    }
}