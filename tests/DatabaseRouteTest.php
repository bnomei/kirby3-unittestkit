<?php
declare(strict_types=1);

use Example\Database;
use Kirby\Data\Json;
use Kirby\Toolkit\A;
use PHPUnit\Framework\TestCase;

class DatabaseRouteTest extends TestCase
{
    protected function setUp(): void
    {
        $this->setOutputCallback(function () {
        });
    }

    public function testDBInvalidRoute(): void
    {
        $response = kirby()->render('/example/db/invalid');
        $this->assertTrue($response->code() === 400);
    }

    public function testDBValidRoute(): void
    {
        $slug = 'rocks';

        $response = kirby()->render("/example/db/{$slug}");
        $this->assertTrue($response->code() === 200);
        $this->assertTrue('application/json' === $response->type());

        $expected = (new Database())->query($slug);
        $field = 'unit';

        $data = Json::decode($response->body());
        // json has field
        $this->assertArrayHasKey($field, $data);
        // db and json match
        $this->assertEquals($expected->{$field}, A::get($data, $field));
    }
}
