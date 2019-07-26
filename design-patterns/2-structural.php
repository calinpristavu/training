<?php

/**
 * Adapter
 *
 * Changes the interface, maintains the implementation
 */

interface ThisIsTheDesiredMethod {
    function doStuffProperly();
}

class WrongMethodName {
    public function doStuff()
    {
    }
}

class DesiredMethodAdapter implements ThisIsTheDesiredMethod {

    private $theAdaptedClass;

    public function __construct(WrongMethodName $theAdaptedClass)
    {
        $this->theAdaptedClass = $theAdaptedClass;
    }

    function doStuffProperly()
    {
        $this->theAdaptedClass->doStuff();
    }
}

$badMethodName = new WrongMethodName();
$goodMethodName = new DesiredMethodAdapter($badMethodName);

$goodMethodName->doStuffProperly(); // actually calls ->doStuff()



/**
 * Decorator
 *
 * Changes the implementation, maintains the interface
 * Discuss example from here: @see https://en.wikipedia.org/wiki/Decorator_pattern#PHP
 */
