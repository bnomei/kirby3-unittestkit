<?php
/** @var Kirby\Cms\App $kirby */
/** @var Kirby\Cms\Site $site */

/** @var DatabasePage $page */
?><h1>Database: <?= $page->title() ?></h1>
<blockquote>
    unit: <?= $page->queryBySlug()->unit ?>
</blockquote>
