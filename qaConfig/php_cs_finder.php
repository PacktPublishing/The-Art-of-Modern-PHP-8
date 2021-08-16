<?php

declare(strict_types=1);

const NOT_PATHS = [
    'Part1/Chapter1/',
    'Part1/Chapter2/ForceInheritance/Person.php',
    'Part1/Chapter2/StaticAccess/ParentClass.php',
    'Part1/Chapter2/Inheritance/',
    'Part1/Chapter2/inheritance.php',
    'Part2/Chapter4/Truthy/TruthDumper.php',
    'Part2/Chapter4/void.php',
    'Part2/Chapter5/object_comparison.php',
    'Part3/Chapter7/early_return.php',
    'Part3/Chapter9/ToyDI/SimpleServiceDefinition.php',
    'Part4/Chapter12/',
];
return PhpCsFixer\Finder::create()
                        ->in([__DIR__ . '/../src', __DIR__ . '/../tests'])
                        ->notPath(NOT_PATHS);

