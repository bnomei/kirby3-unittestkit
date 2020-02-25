<?php

declare(strict_types=1);

namespace Example;

use Kirby\Cms\File;
use Kirby\Cms\Page;

class_alias('Example\TestPage', 'TestPage');

final class TestPage extends Page
{
    public function cover(): ?File
    {
        $files = $this->files()->template('cover-image');
        // why? there might be non and calling method would fail then
        return $files->count() ? $files->first() : null;
    }

    public function hasCover(): bool
    {
        // why? do not repeat code from cover()
        return is_null($this->cover()) === false;
    }

    public function coverAlt(): ?string
    {
        $cover = $this->cover();
        // why? exit early is easy to read
        if (! $cover) {
            return null;
        }

        // why the cast? otherwise it would be a Kirby\Cms\Field
        // and that is unnecessary
        // but casting will trigger the Fields toString() method
        // NOTE: phpstan will find an error since 'alt()' is not
        // (yet) defined anywhere
        return (string) $cover->alt()->or($this->title() . ': titulná fotka');
    }
}
