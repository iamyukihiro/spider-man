<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Infrastructure;

use Goreboothero\SpiderMan\Domain\Exception\CanNotFindDatabaseException;

class LoadFishingEnvironmentalData
{
    public function connect(): array
    {
        $jsonPath = dirname(__FILE__).'/../../.database/fishing_environmental_data/osaka/yodogawa/2022-01-10/tide_data.json';
        $fileHandle = fopen($jsonPath, 'r+');

        if (!$fileHandle) {
            throw new CanNotFindDatabaseException();
        }

        $contents = fread($fileHandle, (int)filesize($jsonPath));

        return json_decode($contents, true);
    }
}
