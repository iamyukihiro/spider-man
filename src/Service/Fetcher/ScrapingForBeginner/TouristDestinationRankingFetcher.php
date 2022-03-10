<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Service\Fetcher\ScrapingForBeginner;

use DOMWrap\Document;
use DOMWrap\Element;
use Goreboothero\SpiderMan\Domain\Model\TouristDestination;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class TouristDestinationRankingFetcher
{
    public function __construct(
        private Client $client,
        private Document $document
    ) {
    }

    public function fetch(): Collection
    {
        $response = $this->requestScrapingPage();
        $html = $response->getBody()->getContents();
        $rankingPageDocument = $this->document->html($html);

        return $this->convertDomToDTOs($rankingPageDocument);
    }

    private function requestScrapingPage(): ResponseInterface
    {
        $response = '';

        try {
            $response = $this->client->get('https://scraping-for-beginner.herokuapp.com/ranking/');
        } catch (Throwable $exception) {
        }

        return $response;
    }

    /**
     * @param Document $rankingPageDocument
     * @return Collection<TouristDestination>
     */
    private function convertDomToDTOs(Document $rankingPageDocument): Collection
    {
        $touristDestinations = [];

        /**
         * @var Element[] $domElements
         */
        $domElements = $rankingPageDocument->find('div.u_areaListRankingBox.row')->toArray();
        foreach ($domElements as $domElement) {
            $headingNumberText         = $domElement->find('div.u_title h2 span.badge')->text();
            $headingNumberAndTitleText = $domElement->find('div.u_title h2')->text();

            $touristDestinationName = mb_substr($headingNumberAndTitleText, mb_strlen($headingNumberText));
            $totalStarRate          = $domElement->find('div.u_rankBox span.evaluateNumber')->text();

            $touristDestinations[] = new TouristDestination($touristDestinationName, $totalStarRate);
        }

        return collect($touristDestinations);
    }
}
