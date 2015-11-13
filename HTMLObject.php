<?php

abstract class HTMLObject {

    protected $tagName;
    protected $attributes;
    protected $children;
    protected $isContainer;
    
    protected $class;

    public function __construct($tagName) {
        $this->tagName = $tagName;
        $this->attributes = array();
        $this->children = array();
    }
    
    
    public function addClass( $class )
    {
        if( !empty($this->class) ){
            $this->class .= " $class";
        }else{
            $this->class = $class;
        }
        
        $this->addAttribute('class', $this->class );
        
        return $this;
    }

    public function addChild($child) {
        if (!$this->isContainer) {
            throw new Exception('Elemento não pode conter outros elementos');
        }

        if ($child instanceof HTMLObject) {
            $this->children[] = $child;
        } else {
            throw new Exception('Elemento deve extender a classe HTMLObject');
        }
        
        return $this;
    }

    public function addAttribute($name, $value) {
        $this->attributes[$name] = $value;
        return $this;
    }
    
    
    protected function hasChild()
    {
        return ( count( $this->children) > 0) ;
    }
    
    protected function hasAttributes()
    {
        return ( count( $this->attributes ) > 0 );
    }

        public abstract function render();

    public function __toString() {
        return $this->render();
    }

}
