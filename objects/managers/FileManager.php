<?php
include_once dirname( __FILE__ ) . '/../BaseObject.php';
include_once dirname( __FILE__ ) . '/../File.php';

class FileManager extends BaseObject {
    /** @var File */
    private $_oFile;

    /**
     * @return File
     */
    public function getFile() {
        return $this->_oFile;
    }

    /**
     * @param File $oFile
     */
    public function setFile( $oFile ) {
        $this->_oFile = $oFile;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function create() {
        if( $this->getFile()->getContent() === null ) {
            throw new Exception( 'The contents of the file must not be empty' );
        }
        $sId = $this->_createUniqId();
        $rFile = fopen( $this->_getUploadsDir() . $sId, 'c+b' );
        fwrite( $rFile, $this->getFile()->getContent() );
        return $sId;
    }

    public function delete() {

    }

    public function get() {

    }

    public function getAll( $iLimit = '20', $iPage = 1 ) {

    }

    private function _createUniqId() {
        return uniqid( 'file_' );
    }

    /**
     * @return string
     */
    protected function _getUploadsDir() {
        return dirname( __FILE__ ) . '/../../uploads/';
    }
}