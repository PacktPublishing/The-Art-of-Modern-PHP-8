<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter9\ToyDI;

use Book\Part3\Chapter9\ToyDI\ContainerFactory;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelOneService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelThreeDep;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelThreeService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\LevelTwoService;
use Book\Part3\Chapter9\ToyDI\Service\DepTree\UbiquitousService;
use Book\Part3\Chapter9\ToyDI\Service\EchoStuff\EchoBarService;
use Book\Part3\Chapter9\ToyDI\Service\EchoStuff\EchoFooService;
use Book\Part3\Chapter9\ToyDI\Service\EchoStuff\EchoStuffInterface;
use Book\Part3\Chapter9\ToyDI\Service\MathsStuff\AdditionService;
use Book\Part3\Chapter9\ToyDI\Service\MathsStuff\MathsInterface;
use Book\Part3\Chapter9\ToyDI\Service\MathsStuff\MultiplicationService;
use Book\Part3\Chapter9\ToyDI\ServiceLocator;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @small
 *
 * @internal
 * @covers \Book\Part3\Chapter9\ToyDI\ContainerFactory
 * @covers \Book\Part3\Chapter9\ToyDI\ServiceFactory
 * @covers \Book\Part3\Chapter9\ToyDI\ServiceLocator
 */
final class ContainerTest extends TestCase
{
    private ServiceLocator $container;

    /**
     * This setup method is called before each and every test.
     * That means that each test gets a pristine new instance of the container ready to play with.
     */
    public function setUp(): void
    {
        $this->container = (new ContainerFactory())->buildAppContainer();
    }

    /**
     * A simple test to ensure we can retrieve the echo service
     * with both the interface and class name as service ID.
     *
     * @test
     */
    public function itCanGetEchoService(): void
    {
        self::assertInstanceOf(
            expected: EchoBarService::class,
            actual: $this->container->get(EchoStuffInterface::class)
        );
        self::assertInstanceOf(
            expected: EchoBarService::class,
            actual: $this->container->get(EchoBarService::class)
        );
    }

    /**
     * Another test to ensure we can retrieve the service.
     * for this service we also have a "short" service ID which is just an arbitrary string
     * Note that this test returns an array.
     * This resulting array is used as input on the itReturnsTheSameInstance test
     * which has defined this test as a dependency.
     *
     * @test
     *
     * @return MathsInterface[]
     */
    public function itCanGetMathsService(): array
    {
        $byInterfaceId = $this->container->get(MathsInterface::class);
        self::assertInstanceOf(
            expected: AdditionService::class,
            actual: $byInterfaceId
        );
        $byClassId = $this->container->get(AdditionService::class);
        self::assertInstanceOf(
            expected: AdditionService::class,
            actual: $byClassId
        );
        $byShortName = $this->container->get(ContainerFactory::SHORTHAND_NAME_FOR_MATHS);
        self::assertInstanceOf(
            expected: AdditionService::class,
            actual: $byShortName
        );

        return [$byInterfaceId, $byClassId, $byShortName];
    }

    /**
     * Here we have a test that uses values returned from other tests in order to do further checks
     * This is a nice way of keeping tests DRY and also splitting test concerns for extra clarity.
     *
     * @test
     * @depends itCanGetMathsService
     * @depends itCanBuildServicesWithDependencies
     *
     * @param object[] $services
     */
    public function itReturnsTheSameInstance(
        array $services
    ): void {
        [$serviceOne, $serviceTwo, $serviceThree] = $services;
        $actual                                   = (
            ($serviceOne === $serviceTwo) && ($serviceOne === $serviceThree)
        );
        self::assertTrue($actual);
    }

    /**
     * Here we have another test retrieving services.
     * This time we are testing a deliberately multi dimensional dependency graph
     * that also includes a "Ubiquitous Service" that is required at every level.
     * We return all instances of the Ubiquitous service so that
     * it can be checked in the itReturnsTheSameInstance test.
     *
     * @test
     *
     * @return UbiquitousService[]
     */
    public function itCanBuildServicesWithDependencies(): array
    {
        /** @var LevelOneService $levelOneService */
        $levelOneService = $this->container->get(LevelOneService::class);
        self::assertInstanceOf(
            expected: LevelOneService::class,
            actual: $levelOneService
        );
        $levelThreeDep = $levelOneService->levelTwoService->levelThreeService->levelThreeDep;
        self::assertInstanceOf(
            expected: LevelThreeDep::class,
            actual: $levelThreeDep
        );

        return [
            $levelOneService->ubiquitousService,
            $levelOneService->levelTwoService->ubiquitousService,
            $levelOneService->levelTwoService->levelThreeService->ubiquitousService,
        ];
    }

    /**
     * this is a data provider, providing values to be used
     * in the hasReturnsTrueForValidServiceIds test.
     *
     * @dataProvider
     *
     * @return Generator<string, array<int,string>>
     */
    public function provideValidServiceIds(): Generator
    {
        yield EchoStuffInterface::class => [EchoStuffInterface::class];
        yield MathsInterface::class => [MathsInterface::class];
        yield LevelOneService::class => [LevelOneService::class];
        yield LevelTwoService::class => [LevelTwoService::class];
        yield LevelThreeService::class => [LevelThreeService::class];
    }

    /**
     * this tests that the call to `has` returns true. We test multiple values
     * by utilising the dataProvider method provideValidServiceIds.
     *
     * @dataProvider provideValidServiceIds
     * @test
     */
    public function hasReturnsTrueForValidServiceIds(
        string $service
    ): void {
        self::assertTrue($this->container->has($service));
    }

    /**
     * this is a another data provider, providing values to be used
     * in the hasReturnsFalseForInvalidServiceIds test.
     *
     * @dataProvider
     *
     * @return Generator<string, array<int,string>>
     */
    public function provideInvalidServiceIds(): Generator
    {
        yield EchoFooService::class => [EchoFooService::class];
        yield MultiplicationService::class => [MultiplicationService::class];
        yield static::class => [static::class];
    }

    /**
     * this tests that the call to `has` returns false. We test multiple values
     * by utilising the dataProvider method provideInvalidServiceIds.
     *
     * @dataProvider provideInvalidServiceIds
     * @test
     */
    public function hasReturnsFalseForInvalidServiceIds(
        string $service
    ): void {
        self::assertFalse($this->container->has($service));
    }
}
