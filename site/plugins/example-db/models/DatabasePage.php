<?php

declare(strict_types=1);

namespace Example;

use Kirby\Cms\Page;
use Kirby\Toolkit\Obj;

class_alias('Example\DatabasePage', 'DatabasePage');

final class DatabasePage extends Page
{
    public function queryBySlug(): ?Obj
    {
        $slug = $this->slug(); // => rocks
        return (new Database())->query($slug);
    }
}
