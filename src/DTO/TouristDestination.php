<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize\ScrapingForBeginner;

use DOMWrap\Document;
use DOMWrap\Element;
use GuzzleHttp\Client;

/**
 * Class TouristDestinationRanking
 * @package Goreboothero\SpiderMan\Seize
 */
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

    /**
     * ScrapingForBeginner constructor.
     * @param Client $client
     * @param Document $document
     */
    public function __construct(Client $client, Document $document)
    {
        $this->client = $client;
        $this->document = $document;
    }

    public function pull()
    {
        $response = $this->client->get('https://scraping-for-beginner.herokuapp.com/ranking/');
        $html = $response->getBody()->getContents();

        $documentNode = new Document();
        $domNode = $documentNode->html($html);

        /**
         * @var Element[] $domElements
         */
        $domElements = $domNode->find('div.u_areaListRankingBox > div > span.evaluateNumber')->toArray();

        foreach ($domElements as $domElement) {
            dump($domElement->getText());
        }
    }
}
