<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
use ReflectionParameter;
use RuntimeException;

final class ServiceFactory
{
    /**
     * This is an array of class names to actual instances of that class.
     * This allows us to ensure we keep only one instance of a given class.
     *
     * @var array <class-string, object|null>
     */
    private array $classNamesToInstances;

    public function __construct(private ServiceLocator $serviceLocator)
    {
        $this->buildClassNamesToInstances();
    }

    /** @param class-string $className */
    public function getInstance(string $className): object
    {
        $this->assertServiceClassName($className);

        // if we already have an instance stored, we just return that
        return $this->classNamesToInstances[$className]
            // otherwise we create an instance and store the result
            // note, the ??= null coalesce assignment operator, assigns the value of
            // the right hand side to the left when the left is null
            ??= new $className(...$this->getDependencyInstances($className));
    }

    private function buildClassNamesToInstances(): void
    {
        foreach ($this->serviceLocator->getIdsToClassNames() as $className) {
            // We build an array with the key as class name and value as null,
            // ready to be replaced with an instance of the class on demand.
            // Note that this implicitly de-duplicates classes that are defined with multiple IDs
            $this->classNamesToInstances[$className] = null;
        }
    }

    private function assertServiceClassName(string $className): void
    {
        if (
            \array_key_exists(
                key:   $className,
                array: $this->classNamesToInstances
            )
        ) {
            return;
        }
        throw new NotFoundException('Class ' . $className . ' is not defined as a service');
    }

    /**
     * @param class-string $className
     *
     * @return array<int,object>
     * @throws ReflectionException
     *
     */
    private function getDependencyInstances(string $className): array
    {
        $return = [];
        // use reflection to retrieve an instance of ReflectionMethod for the constructor
        $constructor = (new ReflectionClass($className))->getConstructor();
        if ($constructor === null) {
            throw new InvalidArgumentException("{$className} does not have a constructor");
        }
        // now we loop over all the parameters of the constructor and build an array of dependencies in the correct order
        // note that we have no safety here at all - a real implementation would need to do a lot more sanity checking
        foreach ($constructor->getParameters() as $reflectionParameter) {
            $return[] = $this->getInstance($this->getServiceClassString($reflectionParameter));
        }

        return $return;
    }

    /** @return class-string */
    private function getServiceClassString(
        ReflectionParameter $reflectionParameter
    ): string {
        return (string)(
            $reflectionParameter->getType()
            ??
            throw new RuntimeException('failed getting class string for type')
        );
    }
}
