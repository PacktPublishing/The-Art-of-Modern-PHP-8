<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition\User;

use Book\Part1\Chapter2\Composition\AdminPermission\AdminPermissionInterface;

final class AdminUser implements UserInterface
{
    /** @var array<string,AdminPermissionInterface> */
    private array $permissions;

    public function __construct(
        private UserData $userData,
        AdminPermissionInterface ...$permissions
    ) {
        \array_map(
            callback: function (AdminPermissionInterface $perm): void {
                $this->permissions[$perm->getPermName()] = $perm;
            },
            array: $permissions
        );
    }

    public function __toString(): string
    {
        return "\n\nadmin user {$this->userData->getName()} ({$this->userData->getId()}) has these permissions: \n" .
               \implode(
                   "\n",
                   \array_map(
                       callback: static function (
                           AdminPermissionInterface $perm
                       ): string {
                           $permName = $perm->getPermName();
                           $allowed  = ($perm->isAllowed() ? 'true' : 'false');

                           return "{$permName}: {$allowed}";
                       },
                       array: $this->permissions
                   )
               ) . "\n";
    }
}
