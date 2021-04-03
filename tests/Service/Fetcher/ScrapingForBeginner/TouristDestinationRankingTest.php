<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Service\Fetcher\ScrapingForBeginner;

use DOMWrap\Document;
use Goreboothero\SpiderMan\Domain\Model\TouristDestination;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

use function assert;

class TouristDestinationRankingTest extends TestCase
{
    /** @var TouristDestinationRanking */
    private $scrapingForBeginner;

    protected function setUp(): void
    {
        $this->scrapingForBeginner = new TouristDestinationRanking(new Client(), new Document());
    }

    public function testIsInstanceOfScrapingForBeginner(): void
    {
        $SUT = $this->scrapingForBeginner;
        $actual = $SUT->pull();

        $this->assertInstanceOf(TouristDestinationRanking::class, $SUT);
        $this->assertInstanceOf(Collection::class, $actual);
        $this->assertInstanceOf(TouristDestination::class, $actual->first());

        $touristDestination = $actual->first();
        assert($touristDestination instanceof TouristDestination);
        $this->assertInstanceOf(TouristDestination::class, $touristDestination);
        $this->assertIsString($touristDestination->getName());
        $this->assertIsString($touristDestination->getTotalStarRate());
    }
}
