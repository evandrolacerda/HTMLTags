<?php

class HTMLTextNode extends HTMLObject {
    protected $text;


    public function __construct( $text ) {
        $this->text = $text;
        $this->isContainer = false;                
    }   

    public function render() {
        return htmlspecialchars($this->text, ENT_QUOTES, 'UTF-8');
    }

}
