<?php

/**
 * NullObject
 *
 * @see https://en.wikipedia.org/wiki/Null_object_pattern#PHP
 * optionally show POP use-case
 */

/**
 * Iterator
 *
 * @see \Iterator
 */

/**
 * Command
 */

class Light {
    public $on = false;
    public $brightness = 20;
}

class LightSwitch {
    /**
     * @var Command[]
     */
    private $morningRoutine;

    public function addToMorningRoutine(Command $command)
    {
        $this->morningRoutine[] = $command;
    }

    public function runMorningRoutine()
    {
        foreach ($this->morningRoutine as $command) {
            $command->exec();
        }
    }
}

abstract class Command {
    /**
     * @var Light
     */
    protected $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    abstract public function exec();
}

class TurnLightOn extends Command {
    public function exec()
    {
        $this->light->on = true;
    }
}

class TurnLightOff extends Command {
    public function exec()
    {
        $this->light->off = true;
    }
}

class Brighten extends Command {
    public function exec()
    {
        $this->light->brightness += 10;
    }
}

class Dim extends Command {
    public function exec()
    {
        $this->light->brightness -= 10;
    }
}

$light = new Light();

$smartSwitch = new LightSwitch();
$smartSwitch->addToMorningRoutine(new TurnLightOn($light));
$smartSwitch->addToMorningRoutine(new Brighten($light));
$smartSwitch->addToMorningRoutine(new Brighten($light));
$smartSwitch->addToMorningRoutine(new Brighten($light));
$smartSwitch->addToMorningRoutine(new TurnLightOff($light));
$smartSwitch->addToMorningRoutine(new TurnLightOn($light));
$smartSwitch->addToMorningRoutine(new TurnLightOff($light));
$smartSwitch->addToMorningRoutine(new TurnLightOn($light));
$smartSwitch->addToMorningRoutine(new TurnLightOff($light));
$smartSwitch->addToMorningRoutine(new TurnLightOn($light));
$smartSwitch->addToMorningRoutine(new Dim($light));

$smartSwitch->runMorningRoutine();



/**
 * Template
 */

abstract class PrintWithATwist {
    public function print()
    {
        printf('I will print this. %s also added this: "%s". Then I continue to print this.%s', static::class, $this->addWhateverYouWant(), PHP_EOL);
    }

    abstract protected function addWhateverYouWant();
}

class Thinker extends PrintWithATwist {
    protected function addWhateverYouWant()
    {
        return 'Is the present the past of the future?';
    }
}

class LesserThinker extends PrintWithATwist {
    protected function addWhateverYouWant()
    {
        return 'I AM GROOT';
    }
}

$a = new Thinker();
$a->print();
$b = new LesserThinker();
$b->print();



/**
 * Strategy
 */

interface FootballStrategy {
    public function getName();
}

class Hagi implements FootballStrategy {
    public function getName()
    {
        return 'Lunga si pe-a doua!';
    }
}

class Iordanescu implements FootballStrategy {
    public function getName()
    {
        return 'Pupam o icoana!';
    }
}

class Barcelona implements FootballStrategy {
    public function getName()
    {
        return 'Tiki Taka';
    }
}

class Team {
    /**
     * @var FootballStrategy
     */
    private $strategy;

    public function play(string $how)
    {
        $strategy = null;
        switch ($how) {
            case '0 - 0':
                $strategy = new Hagi();
                break;
            case '0 - 2':
                $strategy = new Iordanescu();
                break;
            case '5 - 0':
                $strategy = new Barcelona();
                break;
            default:
                $strategy = new Hagi();
        }
        echo $strategy->getName() . PHP_EOL;
    }
}

$team = new Team();
$team->play('0 - 0');
$team->play('1 - 1');
$team->play('2 - 0');
$team->play('0 - 2');
$team->play('5 - 0');
