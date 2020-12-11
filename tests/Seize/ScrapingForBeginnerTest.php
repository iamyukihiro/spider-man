<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize;

use PHPUnit\Framework\TestCase;

class ScrapingForBeginnerTest extends TestCase
{
    /** @var ScrapingForBeginner */
    protected $scrapingForBeginner;

    protected function setUp(): void
    {
        $this->scrapingForBeginner = new ScrapingForBeginner();
    }

    public function testIsInstanceOfScrapingForBeginner(): void
    {
        $actual = $this->scrapingForBeginner;
        $this->assertInstanceOf(ScrapingForBeginner::class, $actual);
    }
}
