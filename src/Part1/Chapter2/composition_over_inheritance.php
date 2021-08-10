<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

use Book\Part1\Chapter2\Composition\AdminPermission\CanEditPermission;
use Book\Part1\Chapter2\Composition\AdminPermission\CanViewPermission;
use Book\Part1\Chapter2\Composition\Person;
use Book\Part1\Chapter2\Composition\UrlCollection;
use Book\Part1\Chapter2\Composition\User\AdminUser;
use Book\Part1\Chapter2\Composition\User\FrontEndUser;
use Book\Part1\Chapter2\Composition\User\UserData;

require __DIR__ . '/../../../vendor/autoload.php';

$frontEndUser = new FrontEndUser(
    new UserData(id: 2, person: new Person(name: 'Steve')),
    new UrlCollection('http://php.com', 'http://something.com')
);
echo $frontEndUser;

$adminUser = new AdminUser(
    new UserData(id: 1, person: new Person(name: 'Joseph')),
    new CanEditPermission(allowed: true),
    new CanViewPermission(allowed: true)
);
echo $adminUser;
