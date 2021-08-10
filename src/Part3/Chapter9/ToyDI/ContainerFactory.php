<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelOneDep;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelOneService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelThreeDep;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelThreeService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelTwoDep;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelTwoService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\UbiquitousService;
use Book\Part3\Chapter9\ToyDI\Service\EchoStuff\EchoBarService;
use Book\Part3\Chapter9\ToyDI\Service\EchoStuff\EchoStuffInterface;
use Book\Part3\Chapter9\ToyDI\Service\MathsStuff\AdditionService;
use Book\Part3\Chapter9\ToyDI\Service\MathsStuff\MathsInterface;

final class ContainerFactory
{
    public const SHORTHAND_NAME_FOR_MATHS = 'maths';

    /**
     * This is an array with the configured service class as the key and an array of one or more service IDs as the
     * value.
     *
     * These IDs can just be the class FQN, or they can be any other arbitrary string.
     *
     * This configurability is fundamental to the inversion of control principle.
     *
     * This allows us to handle mapping interfaces to concretions and also have services available with arbitrary
     * string IDs such as the shorthand name for maths
     *
     * @var array<class-string,array<int,string>>
     */
    private const SERVICE_CLASSES_TO_IDS = [
        AdditionService::class   => [
            MathsInterface::class,
            AdditionService::class,
            self::SHORTHAND_NAME_FOR_MATHS,
        ],
        EchoBarService::class    => [
            EchoStuffInterface::class,
            EchoBarService::class,
        ],
        LevelOneService::class   => [LevelOneService::class],
        LevelOneDep::class       => [LevelOneDep::class],
        LevelTwoService::class   => [LevelTwoService::class],
        LevelTwoDep::class       => [LevelTwoDep::class],
        LevelThreeService::class => [LevelThreeService::class],
        LevelThreeDep::class     => [LevelThreeDep::class],
        UbiquitousService::class => [UbiquitousService::class],
    ];

    public function buildAppContainer(): ServiceLocator
    {
        return new ServiceLocator(...$this->getSimpleDefinitions());
    }

    /** @return ServiceDefinitionInterface[] */
    private function getSimpleDefinitions(): array
    {
        $definitions = [];
        foreach (self::SERVICE_CLASSES_TO_IDS as $className => $ids) {
            $definitions[] = $this->getSimpleDefinition($ids, $className);
        }

        return $definitions;
    }

    /**
     * @param array<int,string> $ids
     * @param class-string      $className
     */
    private function getSimpleDefinition(
        array $ids,
        string $className
    ): SimpleServiceDefinition {
        return new SimpleServiceDefinition($ids, $className);
    }
}
