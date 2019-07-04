<?php

declare(strict_types=1);

$thisIsAnAnonymousFunction = function() {
    // do stuff
};

/**
 * to call it, use the variable as a function
 */

$thisIsAnAnonymousFunction();

/**
 * Anonymous functions are one of the many "callables" in PHP.
 * More on that later.
 */

function () {
    return 'I am a callable. I return this string when I\'m called! Unfortunately I\'m never called here :(';
};

/**
 * Anonymous functions can also receive arguments:
 */
$funcWithArgs = function ($theVariable) {
    var_dump($theVariable);
};

$funcWithArgs('I\'m the variable!');
$funcWithArgs('So am I!');

/**
 * In order to use variables from outside the function context, you use the `use` keyword.
 * Note that the variable IS NOT passed as a function argument, but it's introduced to the function by
 *  `use ($someVariable)`
 */
$variableOutsideOfFunctionContext = 'Intruder';

$funcWithExternalVars = function () use ($variableOutsideOfFunctionContext) {
    echo 'Hello ' . $variableOutsideOfFunctionContext . PHP_EOL;
};
$funcWithExternalVars();
