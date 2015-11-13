<?php

class HTMLAnchor extends HTMLObject{
    protected $label;
    public function __construct( $url, $label ) {
        parent::__construct('a');
        $this->isContainer = false;
        $this->label = $label;
        
        $this->addAttribute('href', $url );
    }

    public function render() 
    {
        $retorno = "<$this->tagName ";
        
        foreach ( $this->attributes as $attr => $value )
        {
            $retorno .= "$attr=\"$value\" ";
        }
        $retorno .= ">";
        
        $retorno .= htmlspecialchars($this->label, ENT_QUOTES, 'UTF-8');
        $retorno .= "</$this->tagName>";
        
        return $retorno;
    }

//put your code here
}
