<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\Domain\Model;

class TouristDestination
{
    /** @var string */
    private $name;

    /** @var string */
    private $totalStarRate;

    public function __construct(string $name, string $totalStarRate)
    {
        $this->name          = $name;
        $this->totalStarRate = $totalStarRate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTotalStarRate(): string
    {
        return $this->totalStarRate;
    }
}
