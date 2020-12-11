<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Seize;

use GuzzleHttp\Client;

/**
 * Class ScrapingForBeginner
 * @package Goreboothero\SpiderMan\Seize
 */
class ScrapingForBeginner
{
    /**
     * @var Client
     */
    private $client;

    /**
     * ScrapingForBeginner constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function pull()
    {
        $client = new Client();

        $response = $client->get('https://scraping-for-beginner.herokuapp.com/ranking/');

        $html = $response->getBody()->getContents();

        dd($html);
    }
}
