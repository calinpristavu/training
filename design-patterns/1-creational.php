<?php

/**
 * FACTORY
 */

class WeirdOne {
    private $prop1;
    private $prop2;
    private $prop3;
    private $prop4;

    public function __construct($prop1, $prop2, $prop3, $prop4)
    {
        $this->prop1 = $prop1;
        $this->prop2 = $prop2;
        $this->prop3 = $prop3;
        $this->prop4 = $prop4;
    }
}

class WeirdOneFactory {
    public static function createFromArray(array $propsAsArray): WeirdOne
    {
        return new WeirdOne(
            $propsAsArray[0],
            $propsAsArray[1],
            $propsAsArray[2],
            $propsAsArray[3],
        );
    }
}

$theObjIWant = WeirdOneFactory::createFromArray([
    'a', 's', 'd', 'f'
]);
var_dump($theObjIWant);



/**
 * FactoryMethod
 */

class WeirdTwo {
    private $prop1;
    private $prop2;
    private $prop3;
    private $prop4;

    public function __construct($prop1, $prop2, $prop3, $prop4)
    {
        $this->prop1 = $prop1;
        $this->prop2 = $prop2;
        $this->prop3 = $prop3;
        $this->prop4 = $prop4;
    }

    public static function createFromArray(array $propsAsArray): self
    {
        return new self(
            $propsAsArray[0],
            $propsAsArray[1],
            $propsAsArray[2],
            $propsAsArray[3],
        );
    }
}

$theObjIWant = WeirdTwo::createFromArray([
    'a', 's', 'd', 'f'
]);
var_dump($theObjIWant);



/**
 * Builder
 */

class WeirdThree {
    protected $prop1;
    protected $prop2;
    protected $prop3;
    protected $prop4;

    public function __construct($prop1, $prop2, $prop3, $prop4)
    {
        $this->prop1 = $prop1;
        $this->prop2 = $prop2;
        $this->prop3 = $prop3;
        $this->prop4 = $prop4;
    }
}

class WeirdThreeBuilder extends WeirdThree{
    public function __construct()
    {

    }

    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;

        return $this;
    }

    public function setProp2($prop2)
    {
        $this->prop2 = $prop2;

        return $this;
    }

    public function setProp3($prop3)
    {
        $this->prop3 = $prop3;

        return $this;
    }

    public function setProp4($prop4)
    {
        $this->prop4 = $prop4;

        return $this;
    }

    public function getInstance(): WeirdThree {
        return new WeirdThree(
            $this->prop1,
            $this->prop2,
            $this->prop3,
            $this->prop4
        );
    }
}

$theBuilder = new WeirdThreeBuilder();
$theBuilder
    ->setProp1('a')
    ->setProp2('s')
    ->setProp3('d')
    ->setProp4('f');

$theObjIWant = $theBuilder->getInstance();
var_dump($theObjIWant);



/**
 * Singleton
 *
 * Considered anti-pattern in most cases.
 */

class WeirdFour {
    protected $prop1;
    protected $prop2;
    protected $prop3;
    protected $prop4;
    private static $theInstance;

    /**
     * Notice the private constructor
     */
    private function __construct($prop1, $prop2, $prop3, $prop4)
    {
        $this->prop1 = $prop1;
        $this->prop2 = $prop2;
        $this->prop3 = $prop3;
        $this->prop4 = $prop4;

        self::$theInstance = $this;
    }

    public static function create($prop1, $prop2, $prop3, $prop4)
    {
        if (self::$theInstance !== null) {
            return self::$theInstance;
        }

        return new self($prop1, $prop2, $prop3, $prop4);
    }
}

$theObjIWant1 = WeirdFour::create('a', 's', 'd', 'f');
$theObjIWant2 = WeirdFour::create('a', 's', 'd', 'f');

// $theObjIWant1 = new WeirdFour('a', 's', 'd', 'f');
// $theObjIWant2 = new WeirdFour('a', 's', 'd', 'f');
// false

var_dump($theObjIWant1, $theObjIWant1 === $theObjIWant2);
