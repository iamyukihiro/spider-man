<?php
declare(strict_types=1);

namespace Goreboothero\SpiderMan\Infrastructure\Datastore;

use Goreboothero\SpiderMan\Domain\Exception\CanNotFindDatastoreException;

class FishingEnvironmentalDataLoader
{
    public function load(): array
    {
        $jsonPath = dirname(__FILE__).'/../../../.datastore/fishing_environmental_data/osaka/yodogawa/2022-01-10/tide_data.json';
        $fileHandle = fopen($jsonPath, 'r+');

        if (!$fileHandle) {
            throw new CanNotFindDatastoreException();
        }

        $contents = fread($fileHandle, (int)filesize($jsonPath));

        return json_decode($contents, true);
    }
}
