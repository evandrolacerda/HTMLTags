<?php


class HTMLOption extends HTMLObject{
    
    protected $label;
    protected $value;
    protected $isSelected;


    public function __construct( $optionValue, $optionLabel, $selected = false ) {
        parent::__construct('option');
        $this->isContainer = false; 
        $this->isSelected = $selected;
        $this->label = $optionLabel;
        $this->value = $optionValue;
        
        $this->addAttribute('value', $this->value );
    }  


    public function render()
    {
        $retorno = sprintf("<%s ", $this->tagName );
        
        foreach ( $this->attributes as $chave => $valor) {
            $retorno .= sprintf("%s=\"%s\"", $chave, $valor );
        }
        if( $this->isSelected ){
            $retorno .= " selected"; 
        }
        $retorno .= ">";
        
        $retorno .= htmlspecialchars($this->label, ENT_QUOTES, 'UTF-8');
        
        $retorno .= "</$this->tagName>";
        
        return $retorno;
    }

}
