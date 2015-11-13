<?php


class HTMLTextArea extends HTMLObject {

    public function __construct( $id, $cols, $rows) {
        parent::__construct('textarea');
        
        $this->isContainer = false;
        $this->addAttribute('cols', $cols );
        $this->addAttribute('rows', $rows );
        $this->addAttribute('id', $id );
        $this->addAttribute('name', $id );
    }
    
    public function render() {
        $retorno = "<$this->tagName ";
        
        foreach ( $this->attributes as $attr => $value )
        {
            $retorno .= "$attr=\"$value\" ";
        }
        
        $retorno .= ">";
        $retorno .= "</$this->tagName>";
        
        
        return $retorno;
    }

}
