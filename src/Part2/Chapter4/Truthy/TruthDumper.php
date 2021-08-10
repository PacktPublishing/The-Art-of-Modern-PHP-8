<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4\Truthy;

final class TruthDumper
{
    private const HEADERS = [
        'item ',
        'equal',
        'identical',
        'if',
        'empty',
        'isset',
        'switch',
        'match',
    ];

    public static function createTable(mixed ...$inputs): string
    {
        $rows   = [];
        $header = implode(separator: ' | ', array: self::HEADERS);
        $rows[] = $header;
        $line   = str_repeat(string: '-', times: strlen($header));
        $rows[] = $line;
        foreach ($inputs as $input) {
            $rows[] = self::row($input);
        }

        return "\n" . implode(separator: "\n", array: $rows) . "\n";
    }

    private static function row(mixed $input): string
    {
        $items   = [self::pad(var_export($input, true), 'item ')];
        $items[] = self::equal($input);
        $items[] = self::identical($input);
        $items[] = self::if($input);
        $items[] = self::empty($input);
        $items[] = self::isset($input);
        $items[] = self::switch($input);
        $items[] = self::match($input);

        return implode(' | ', $items);

    }

    private static function equal(mixed $input): string
    {
        $truthy = ($input == true);

        return self::pad((string)(int)$truthy, 'equal');
    }

    private static function identical(mixed $input): string
    {
        $truthy = ($input === true);

        return self::pad((string)(int)$truthy, 'identical');
    }

    private static function if(mixed $input): string
    {
        $truthy = ($input ? true : false);

        return self::pad((string)(int)$truthy, 'if');
    }

    private static function empty(mixed $input): string
    {
        $truthy = (empty($input) === false);

        return self::pad((string)(int)$truthy, 'empty');
    }

    private static function isset(mixed $input): string
    {
        $truthy = (isset($input));

        return self::pad((string)(int)$truthy, 'isset');
    }

    private static function switch(mixed $input): string
    {
        switch (true) {
            case $input:
                $truthy = true;
                break;
            default:
                $truthy = false;
        }

        return self::pad((string)(int)$truthy, 'switch');
    }

    private static function pad(string $string, string $key): string
    {
        $pad = strlen($key);

        return sprintf("%${pad}s", $string);
    }

    private static function match(mixed $input): string
    {
        $truthy = match (true) {
            $input => true,
            default => false,
        };

        return self::pad((string)(int)$truthy, 'match');
    }
}
