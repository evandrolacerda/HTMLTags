<?php

require 'HTMLObject.php';

class HTMLForm extends HTMLObject {

    public function __construct($id) {
        parent::__construct('form');
        $this->isContainer = true;

        parent::addAttribute('id', $id);
    }

    public function setMethod($metodo) {
        $metodos = array('GET', 'POST');

        if (!in_array($metodo, $metodos)) {
            throw new Exception('Método inexistente');
        }

        $this->addAttribute('method', $metodo);
    }

    public function setAction($action) {
        $this->addAttribute('action', $action);
    }    

    public function render() {
        $retorno = "<{$this->tagName} ";

        if ($this->hasAttributes()) {
            foreach ($this->attributes as $chave => $valor) {
                $retorno .= sprintf("%s=%s\n", $chave, $valor);
            }
        }

        //adiciona > ao final da tag de abertura
        $retorno .= ">";

        if ($this->hasChild()) {
            foreach ($this->children as $item) {
                $retorno .= $item;
            }
        }

        if ($this->isContainer) {
            $retorno .= sprintf("</%s>", $this->tagName);
        } else {
            $retorno .= " />";
        }
        
        return $retorno;
    }

//put your code here
}
