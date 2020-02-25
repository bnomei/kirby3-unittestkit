<?php

declare(strict_types=1);

namespace Example;

use Kirby\Toolkit\Obj;

final class Database
{
    public function query(string $slug): ?Obj
    {
        return in_array($slug, ['rocks']) ?
            new Obj(['unit' => 'tested']) :
            null;
    }
}
