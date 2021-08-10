<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\ForceInheritance;

/**
 * Class CAN be instantiated, CANNOT be inherited from.
 */
final class AdminUser extends AbstractUser
{
    /** @var array<string,AdminPermission> */
    private array $permissions;

    public function __construct(
        protected int $id,
        protected string $name,
        AdminPermission ...$permissions
    ) {
        parent::__construct($id, $name);
        \array_map(
            callback: function (AdminPermission $perm): void {
                $this->permissions[$perm->getPermName()] = $perm;
            },
            array: $permissions
        );
    }

    public function __toString(): string
    {
        $permissions = \implode(
            separator: "\n",
            array: \array_map(
                callback: static function (
                    AdminPermission $perm
                ): string {
                    $permName = $perm->getPermName();
                    $allowed  = ($perm->isAllowed() ? 'true' : 'false');

                    return "{$permName}: {$allowed}";
                },
                array: $this->permissions
            )
        );

        return <<<STRING
            
            admin user {$this->name} ({$this->id}) has these permissions:
            {$permissions}
            
            STRING;
    }
}
