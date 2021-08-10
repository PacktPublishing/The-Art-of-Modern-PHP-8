<?php

declare(strict_types=1);

namespace Book\Part3\Chapter7;

/**
 * Note the error returns are towards the end of the function
 * - a dead giveaway that this should be returning early
 */
function isValidValueNested(int|float|null $value): bool
{                                            # cylomatic complexity 1
    if (is_int($value) || is_float($value)) {# cylomatic complexity 3
        if ($value > 10) {                   # cylomatic complexity 4
            if ($value < 200) {              # cylomatic complexity 5
                return true;
            } else {                         # cylomatic complexity 6
                return false;
            }
        } else {                             # cylomatic complexity 7
            return false;
        }
    } else {                                 # cylomatic complexity 8
        return false;
    }
}

/**
 * Trying to reduce this to a one liner can reduce cylomatic complexity, but it
 * can also have a negative impact on legibility and clarity, breaking the KICK rules.
 * It is generally not likely to be the lowest cyclomatic complexity
 * and is not a strategy you should employ in general to reduce cyclomatic complexity
 */
function isValidValueOneLiner(int|float|null $value): bool
{                           # cylomatic complexity 1
    return (
        (null !== $value)   # cylomatic complexity 2
        && ($value > 10)    # cylomatic complexity 3
        && ($value < 200)   # cylomatic complexity 4
    );
}

/**
 * This function uses the "early return" style to expose and wrap up decision points early in the function, returning
 * as soon as possible and thereby closing a decision tree.
 * By checking for errors and returning early, we can totally avoid any nesting, and it is sooo
 * much easier to read
 * I would suggest this should be your default cyclomatic complexity reducing strategy
 */
function isValidValueEarlyReturn(int|float|null $value): bool
{                          # cylomatic complexity 1
    if (null === $value) { # cylomatic complexity 2
        return false;
    }
    if ($value < 10) {     # cylomatic complexity 3
        return false;
    }
    if ($value > 200) {    # cylomatic complexity 4
        return false;
    }

    return true;
}

/**
 * The eagle eyed among you might have spotted that there are unnecessary decision points in the above functions.
 * Removing these is another valid cyclomatic reduction strategy and can be employed.
 * I would not generally recommend this unless you have good unit test coverage to ensure you have not
 * inadvertently broken things, or you are really, really sure you have read the code correctly :)
 */
function isValidLogicallyReduced(int|float|null $value): bool
{                                       # cylomatic complexity 1
    return $value > 10 && $value < 200; # cylomatic complexity 3
}

echo "\nisValidValueNested(20)===isValidValueOneLiner(20)? " .
     var_export(isValidValueNested(20) === isValidValueOneLiner(20), true);

echo "\nisValidValueNested(20)===isValidValueEarlyReturn(20)? " .
     var_export(isValidValueNested(20) === isValidValueEarlyReturn(20), true);

echo "\nisValidValueNested(20)===isValidLogicallyReduced(20)? " .
     var_export(isValidValueNested(20) === isValidLogicallyReduced(20), true);
