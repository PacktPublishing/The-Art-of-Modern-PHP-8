<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\ForceInheritance;

/**
 * Class CANNOT be instantiated, CAN be inherited from.
 */
abstract class AdminPermission
{
    public const CAN_EDIT = 'canEdit';
    public const CAN_VIEW = 'canView';
    public const PERMS    = [
        self::CAN_EDIT,
        self::CAN_VIEW,
    ];

    abstract public function getPermName(): string;

    abstract public function isAllowed(): bool;
}
