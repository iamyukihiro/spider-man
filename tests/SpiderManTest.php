<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan;

use PHPUnit\Framework\TestCase;

class SpiderManTest extends TestCase
{
    /** @var SpiderMan */
    protected $spiderMan;

    protected function setUp(): void
    {
        $this->spiderMan = new SpiderMan();
    }

    public function testIsInstanceOfSpiderMan(): void
    {
        $actual = $this->spiderMan;
        $this->assertInstanceOf(SpiderMan::class, $actual);
    }
}
