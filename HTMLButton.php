<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTMLButton
 *
 * @author Administrador
 */
class HTMLButton extends HTMLObject{
    protected $label;
            
    public function __construct($label, $type ) {
        parent::__construct('button');        
        $this->label = $label;
        $this->isContainer = false;        
        $this->addAttribute('type', $type );        
        
    }

    

    public function render() {
        $retorno = "<$this->tagName ";
        
        foreach ( $this->attributes as $attr => $value )
        {
            $retorno .= "$attr=\"$value\" ";
        }
        
        $retorno .= ">$this->label";
        $retorno .= "</$this->tagName>";
        
        
        return $retorno;
        
        
    }

}
