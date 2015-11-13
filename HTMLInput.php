<?php

class HTMLInput extends HTMLObject {

    public function __construct($type, $id) {
        parent::__construct('input');
        $this->addAttribute('name', $id);
        $this->isContainer = false;
    }

    public function setName($name) {
        $this->addAttribute('name', $name);
    }

    public function render() {
        $retorno = sprintf("<%s ", $this->tagName);

        foreach ($this->attributes as $key => $value) {
            $retorno .= "{$key}=\"{$value}\" ";
        }

        if ($this->isContainer) {
            $retorno .= ">";
            if (count($this->children) > 0) {
                foreach ($this->children as $item) {
                    $retorno .= "\n $item";
                }
            }

            $retorno .= "</$this->tagName>";
        } else {
            $retorno .= "/>";
        }

        return $retorno;
    }    

}
