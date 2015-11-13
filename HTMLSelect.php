<?php

class HTMLSelect extends HTMLObject{
    protected $isMultiple;


    public function __construct( $id, $multiple = false ) {
        parent::__construct('select');
        $this->isContainer = true;        
        
        $this->addAttribute('nome', $id );
        $this->addAttribute('id', $id );
        $this->isMultiple = $multiple;
    }
    
    public function render() {
        $retorno = "<{$this->tagName} ";
        
        if( $this->hasAttributes() ){
            foreach ($this->attributes as $chave => $valor ) {
                $retorno .= sprintf("%s=\"%s\" ", $chave, $valor );
            }
        }
        
        if( $this->isMultiple ){
            $retorno .= 'multiple ';
        }
        
        //adiciona > ao final da tag de abertura
        $retorno .= ">\n";
        
        
        if( $this->hasChild() ){
            foreach ($this->children as $item ) {
                $retorno .= $item ."\n";
            }
        }
        
        if( $this->isContainer ){
            $retorno .= sprintf("</%s>\n", $this->tagName );
        }else{
            $retorno .= " />";
        }
        return $retorno;
        
    }

}
