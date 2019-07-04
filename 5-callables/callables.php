<?php

declare(strict_types=1);

call_user_func('print_r', 'This is a hipsters hello world.'.PHP_EOL);

/**
 * Remember anonymous functions? they are useless if no one is calling them.
 */

$anon = function () {
    echo '123'.PHP_EOL;
};

/**
 * You can do it the easy way
 */
$anon();

/**
 * Or the hard way
 */
call_user_func($anon);

/**
 * Or without any variables
 */
call_user_func(function () {
    echo 'You might find this in real projects.'.PHP_EOL;
});

/**
 * Some arrays are also callables:
 *  they must have a valid class name as the first value
 *  they must have a valid STATIC function name from that class as the second value
 */

var_dump(
    call_user_func(['DateTime', 'createFromFormat'], 'd-m-y', '13-10-90')
);

/**
 * Using Class::function is the same as using [class, function] for callables.
 */
var_dump(
    call_user_func('DateTime::createFromFormat', 'd-m-y', '13-10-90')
);

/**
 * List of callables with names:
 *
 *  Callable                              | Name
 * ---------------------------------------+--------------
 *  function (...) {...}                  | 'closure'
 *  function (...) use (...) {...}        | 'closure'
 *  class (that implements __invoke)      | 'invocable'
 *  "function_name"                       | 'function'
 *  "class::method"                       | 'static'
 *  ["class", "parent::method"]           | 'static'
 *  ["class", "self::method"]             | 'static'
 *  ["class", "method"]                   | 'static'
 *  [$object, "parent::method"]           | 'object'
 *  [$object, "self::method"]             | 'object'
 *  [$object, "method"]                   | 'object'
 */

/**
 * @see https://www.php.net/manual/en/language.types.callable.php for more examples
 */
