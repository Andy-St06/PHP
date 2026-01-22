<?php
class A{
    private $private = "private";
    protected $test = "protected";
    protected function FunctionProtected($parm) {
        return "found Protected Method";
    }
}

class B extends A{
    function test(){
        echo $this->test;
        echo $this->FunctionProtected(""); //geht
        //echo $this->private; //geht nicht
    }
}

$a = new B();
echo $a->test(); //geht
//echo $a->FunctionProtected(""); //geht nicht