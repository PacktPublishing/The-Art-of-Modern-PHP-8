<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View\Template;

use Book\Part3\Chapter8\ToyMVC\View\Data\CategoryPageData;
use Book\Part3\Chapter8\ToyMVC\View\Esc;

/** @var CategoryPageData $templateData */
$category = $templateData->getCategory();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Category <?php echo Esc::_($category->getName()); ?></title>
</head>
<body>
<h1><?php echo Esc::_($category->getName()); ?></h1>
<ul>
    <ul>
        <?php foreach ($category->getPostCollection() as $postId => $post) { ?>
            <li>
                <a href="/p/<?php echo $postId; ?>"><?php echo Esc::_($post->getTitle()); ?></a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>