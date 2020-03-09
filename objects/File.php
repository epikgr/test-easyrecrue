<?php
include_once  dirname(__FILE__) . '/BaseObject.php';

class File extends BaseObject {
    /** @var string */
    private $_sId;
    /** @var string */
    private $_sContent;

    /**
     * @return string
     */
    public function getId() {
        return $this->_sId;
    }

    /**
     * @param string $sId
     */
    public function setId( $sId ) {
        $this->_sId = $sId;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->_sContent;
    }

    /**
     * @param string $sContent
     */
    public function setContent( $sContent ) {
        $this->_sContent = $sContent;
    }


}