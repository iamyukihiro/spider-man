<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ScrapingForBeginnerTest extends TestCase
{
    /** @var ScrapingForBeginner */
    protected $scrapingForBeginner;

    protected function setUp(): void
    {
        $this->scrapingForBeginner = new ScrapingForBeginner(new Client());
    }

    public function testIsInstanceOfScrapingForBeginner(): void
    {
        $actual = $this->scrapingForBeginner;
        $actual->pull();

        $this->assertInstanceOf(ScrapingForBeginner::class, $actual);
    }
}
