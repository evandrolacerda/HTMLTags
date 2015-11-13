<?php

class HTMLLabel extends HTMLObject{
    protected $labelText;


    public function __construct( $label, $for ) {
        parent::__construct('label');
        $this->isContainer = true;        
        $this->labelText = $label;
        $this->addAttribute('for', $for );
    }
        
    

    public function render() {
        $retorno = "<{$this->tagName} ";
        
        if( $this->hasAttributes() ){
            foreach ($this->attributes as $chave => $valor ) {
                $retorno .= sprintf("%s=\"%s\"", $chave, $valor );
            }
        }
        
        //adiciona > ao final da tag de abertura
        $retorno .= "> $this->labelText";
        
        
        if( $this->hasChild() ){
            foreach ($this->children as $item ) {
                $retorno .= $item ."\n";
            }
        }
        
        if( $this->isContainer ){
            $retorno .= sprintf("</%s>", $this->tagName );
        }else{
            $retorno .= " />";
        }
        return $retorno;
    }

}
