<?php

declare(strict_types=1);

$generator = function (): \Generator {
    for ($i = 0; $i < 10; $i++) {
        yield $i;
    }
};

foreach ($generator() as $item => $value) {
    printf("%s => %s\n", $item, $value);
}

/**
 * Generators can use the same key multiple times, unlike arrays
 *
 * Note how the var_dump in the generator is only called once per foreach iteration
 */
$generatorSameKey = function (): \Generator {
    for ($i = 0; $i < 10; $i++) {
        var_dump('processing id: ' . $i);
        yield 'same key' => $i;
    }
};

foreach ($generatorSameKey() as $item => $value) {
    printf("%s => %s\n", $item, $value);
}

/**
 * @see https://www.php.net/manual/en/language.generators.overview.php for more examples
 */
