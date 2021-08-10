<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

use Psr\Container\ContainerInterface;

final class ServiceLocator implements ContainerInterface
{
    /**
     * This is an array of service IDs to the class name configured for the service.
     *
     * @var array<string, class-string>
     */
    private array $idsToClassNames;

    private ServiceFactory $serviceFactory;

    public function __construct(
        ServiceDefinitionInterface ...$serviceDefinitions
    ) {
        foreach ($serviceDefinitions as $serviceDefinition) {
            $this->storeDefinition($serviceDefinition);
        }
        $this->serviceFactory = new ServiceFactory($this);
    }

    /**
     * This is the first of the two methods defined in the PSR ContainerInterface.
     * The interface does not define a param type and so we are not able to either
     * due to the contravariance (remember that) rules that say parameter types are only able to become looser
     * thanks to covariance rules, we are able to add return type hints though.
     *
     * @throws NotFoundException
     */
    public function get($id): object
    {
        // first determine which class to use for the service ID
        $className = $this->getClassFullyQualifiedNameForId($id);

        // then we use the service factory to get or create the instance
        return $this->serviceFactory->getInstance($className);
    }

    /**
     * This is the second of the two methods defined in the PSR ContainerInterface.
     */
    public function has($id): bool
    {
        return isset($this->idsToClassNames[$id]);
    }

    /** @return array<string,class-string> */
    public function getIdsToClassNames(): array
    {
        return $this->idsToClassNames;
    }

    private function storeDefinition(
        ServiceDefinitionInterface $serviceDefinition
    ): void {
        foreach ($serviceDefinition->getIds() as $id) {
            // First we build a lookup between IDs to class names
            $this->idsToClassNames[$id] =
                $serviceDefinition->getClassFullyQualifiedName();
        }
    }

    /**
     * @throws NotFoundException
     *
     * @return class-string
     */
    private function getClassFullyQualifiedNameForId(string $id): string
    {
        return $this->idsToClassNames[$id]
               ?? throw new NotFoundException(
                   'Failed finding service class for ' . $id
               );
    }
}
