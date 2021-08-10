<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View\Template;

use Book\Part3\Chapter8\ToyMVC\View\Data\PostPageData;
use Book\Part3\Chapter8\ToyMVC\View\Esc;

/** @var PostPageData $templateData */
$post = $templateData->getPost();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Post <?php echo Esc::_($post->getTitle()); ?></title>
</head>
<body>
<h1><?php echo Esc::_($post->getTitle()); ?></h1>
<?php echo Esc::_($post->getContentHtml()); ?>
</body>
</html>