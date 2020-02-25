<?php
declare(strict_types=1);

use Example\Database;
use Kirby\Toolkit\Obj;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testInstance(): void
    {
        $db = new Database();
        $this->assertInstanceOf(Database::class, $db);
    }

    public function testValidQuery(): void
    {
        $db = new Database();
        $this->assertNotNull($db->query('rocks'));
    }

    public function testSpecificValidQuery(): void
    {
        $db = new Database();
        $object = $db->query('rocks');

        $this->assertInstanceOf(Obj::class, $object);

        $result = $object->toArray();
        $this->assertIsArray($result);

        $this->assertArrayHasKey('unit', $result);
    }

    public function testInvalidQuery(): void
    {
        $db = new Database();
        $this->assertNull($db->query('socks'));
    }
}
