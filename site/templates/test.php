<?php
/** @var Kirby\Cms\App $kirby */
/** @var Kirby\Cms\Site $site */

// NOTE: autocomplete for models. see composer.json autoload psr-4
/** @var TestPage $page */
?><h1>Test: <?= $page->title() ?></h1>

<?php if ($page->hasCover()) { ?>
<div style="background: red; padding: 20px;">
  <img src="<?= $page->cover()->url() ?>"
       alt="<?= $page->coverAlt() ?>"
       style="width: 20px; height: 20px;">
</div>
<?php } ?>
