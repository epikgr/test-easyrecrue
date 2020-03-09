<?php

class BaseObject {
    /**
     * BaseObject constructor.
     * @param null|array $aOptions
     */
    public function __construct( $aOptions = null )
    {
        if ( is_array( $aOptions ) && count( $aOptions ) )
        {
            $this->setOptions( $aOptions );
        }
    }

    /**
     * @param array $aOptions
     * @return array
     */
    public function setOptions( array $aOptions )
    {
        $aOptionsUndefinedSetter = array();

        foreach( $aOptions as $sOptName => $mOptValue )
        {
            $sSetterMethod = sprintf( 'set%s',  str_replace(' ', '', ucwords( strtolower( str_replace('_', ' ', $sOptName) ) ) ) );
            if ( method_exists( $this, $sSetterMethod ) ) {
                $this->$sSetterMethod( $mOptValue );
            } else {
                $aOptionsUndefinedSetter[] = $sOptName;
            }
        }

        return $aOptionsUndefinedSetter;
    }

}