<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize\ScrapingForBeginner;

use DOMWrap\Document;
use DOMWrap\Element;
use Goreboothero\SpiderMan\DTO\TouristDestination;
use GuzzleHttp\Client;

class TouristDestinationRanking
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Document
     */
    private $document;

    public function __construct(Client $client, Document $document)
    {
        $this->client   = $client;
        $this->document = $document;
    }

    public function pull(): void
    {
        $response = $this->client->get('https://scraping-for-beginner.herokuapp.com/ranking/');
        $html = $response->getBody()->getContents();

        $rankingPageDocument = $this->document->html($html);
        $touristDestinations = $this->makeRankingPageDocumentToTouristDestinations($rankingPageDocument);

        dd($touristDestinations);
    }

    /**
     * @param Document $rankingPageDocument
     * @return TouristDestination[]
     */
    private function makeRankingPageDocumentToTouristDestinations(Document $rankingPageDocument): array
    {
        $touristDestinations = [];

        /**
         * @var Element[] $domElements
         */
        $domElements = $rankingPageDocument->find('div.u_areaListRankingBox.row')->toArray();
        foreach ($domElements as $domElement) {
            $headingNumberText = $domElement->find('div.u_title h2 span.badge')->text();
            $headingNumberAndTitleText = $domElement->find('div.u_title h2')->text();

            $touristDestinationName = mb_substr($headingNumberAndTitleText, mb_strlen($headingNumberText));
            $totalStarRate = $domElement->find('div.u_rankBox span.evaluateNumber')->text();

            // TODO:Factoryで生成するようにする
            $touristDestinations[] = new TouristDestination($touristDestinationName, $totalStarRate);
        }

        return $touristDestinations;
    }
}
