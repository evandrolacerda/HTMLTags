<?php

class HTMLRadio extends HTMLObject {
    protected $label;


    public function __construct( $value, $label ) {
        parent::__construct('input');
        
        $this->addAttribute('type', 'radio' );
        $this->addAttribute('value', $value );
        $this->isContainer = false;
        $this->label = $label;
    }
    
    
    public function render() {
        
        $retorno = "<$this->tagName ";
        
        foreach ( $this->attributes as $attr => $value )
        {
            $retorno .= "$attr=\"$value\" ";
        }
        $retorno .= " />";
        
        $retorno .= htmlspecialchars($this->label, ENT_QUOTES, 'UTF-8');
        
        return $retorno;
    }

}
