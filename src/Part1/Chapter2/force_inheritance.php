<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

use Book\Part1\Chapter2\ForceInheritance\AdminPermission;
use Book\Part1\Chapter2\ForceInheritance\AdminUser;
use Book\Part1\Chapter2\ForceInheritance\FrontEndUser;

require __DIR__ . '/../../../vendor/autoload.php';

$frontEndUser = new FrontEndUser(
    2,
    'Steve',
    'http://php.com',
    'http://something.com'
);
echo $frontEndUser;

$adminUser = new AdminUser(
    1,
    'Joseph',
    new class() extends AdminPermission {
        public function getPermName(): string
        {
            return self::CAN_VIEW;
        }

        public function isAllowed(): bool
        {
            return true;
        }
    },
    new class() extends AdminPermission {
        public function getPermName(): string
        {
            return self::CAN_EDIT;
        }

        public function isAllowed(): bool
        {
            return false;
        }
    },
);

echo $adminUser;
