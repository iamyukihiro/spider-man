<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize\ScrapingForBeginner;

use DOMWrap\Document;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class TouristDestinationRankingTest extends TestCase
{
    /** @var TouristDestinationRanking */
    protected $scrapingForBeginner;

    protected function setUp(): void
    {
        $this->scrapingForBeginner = new TouristDestinationRanking(new Client(), new Document());
    }

    public function testIsInstanceOfScrapingForBeginner(): void
    {
        $actual = $this->scrapingForBeginner;
        $actual->pull();

        $this->assertInstanceOf(TouristDestinationRanking::class, $actual);
    }
}
