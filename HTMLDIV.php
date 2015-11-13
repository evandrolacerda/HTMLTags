<?php


class HTMLDIV extends HTMLObject {
    
    public function __construct( $id ) {
        parent::__construct('div');        
        $this->addAttribute('id', $id );        
        $this->isContainer = true;
    }


    public function render() 
    {
        $retorno = "<{$this->tagName} ";
        
        if( $this->hasAttributes() ){
            foreach ($this->attributes as $chave => $valor ) {
                $retorno .= sprintf("%s=\"%s\"", $chave, $valor );
            }
        }
        
        //adiciona > ao final da tag de abertura
        $retorno .= ">";
        
        
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
