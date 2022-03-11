<?php
declare(strict_types=1);

namespace Goreboothero\SpiderMan\Domain\Model;

class TouristDestination
{
    public function __construct(
        private string $name,
        private string $totalStarRate
    ) {
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
