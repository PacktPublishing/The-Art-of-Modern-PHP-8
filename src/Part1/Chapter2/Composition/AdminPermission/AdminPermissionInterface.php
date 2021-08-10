<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition\AdminPermission;

interface AdminPermissionInterface
{
    public const CAN_EDIT = 'canEdit';
    public const CAN_VIEW = 'canView';
    public const PERMS    = [
        self::CAN_EDIT,
        self::CAN_VIEW,
    ];

    public function getPermName(): string;

    public function isAllowed(): bool;
}
