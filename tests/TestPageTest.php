<?php
declare(strict_types=1);

use Kirby\Cms\Field;
use Kirby\Cms\Page;
use PHPUnit\Framework\TestCase;

class TestPageTest extends TestCase
{
    /** @var TestPage|Page|null */
    private $page;

    /** @var array */
    private $rollback;

    // will run before EACH test
    public function setUp(): void
    {
        $this->page = kirby()->page('test');

        // NOTE: simple rollback. use a zip lib or
        // exec and git reject for folders instead.
        $this->rollback = $this->page->readContent();
    }

    // will run after EACH test
    public function tearDown(): void
    {
        // use $this->rollback = null to cancel rollback
        // and skip a F::write
        if ($this->rollback) {
            $this->page->writeContent($this->rollback);
        }
    }

    public function testInstance(): void
    {
        $this->rollback = null; // no rollback needed

        $this->assertInstanceOf(TestPage::class, $this->page);
    }

    public function testTitle(): void
    {
        $this->rollback = null; // no rollback needed

        // NOTE: be careful since Fields are cast as string automatically
        // and not easily asserted with phpunit
        $this->assertInstanceOf(Field::class, $this->page->title());
        // $this->assertIsString($this->page->title()); // would fail
        $this->assertEquals('Test-a-Page', $this->page->title());
        $this->assertEquals('Test-a-Page', $this->page->title()->value());
        $this->assertEquals('Test-a-Page', (string) $this->page->title());
    }

    public function testUpdate(): void
    {
        // Do a rollback this time...

        $other = 'impersonate & update';

        kirby()->impersonate('kirby');
        $updatedPage = $this->page->update(['title' => $other]);
        // NOTE: kirby does not update $this->page on it own.
        $this->page = $updatedPage;

        $this->assertEquals($other, $updatedPage->title());
        $this->assertEquals($other, $this->page->title());
    }
}
