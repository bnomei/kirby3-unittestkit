<?php
declare(strict_types=1);

use Kirby\Cms\Page;
use Kirby\Toolkit\Obj;
use PHPUnit\Framework\TestCase;

class DatabasePageTest extends TestCase
{
    /** @var DatabasePage|Page|null */
    private $page;

    public function setUp(): void
    {
        $this->page = kirby()->page('rocks');
    }

    public function testInstance(): void
    {
        $this->assertInstanceOf(DatabasePage::class, $this->page);
    }

    public function testPageMethodQueryBySlug(): void
    {
        $object = $this->page->queryBySlug(); // new Obj(['unit' => 'tested'])
        $this->assertInstanceOf(Obj::class, $object);
        $this->assertEquals('tested', $object->unit);
    }
}
