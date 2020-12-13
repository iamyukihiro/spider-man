<?php

declare(strict_types=1);

namespace Goreboothero\SpiderMan\DTO;

/**
 * Class TouristDestination
 * @package Goreboothero\SpiderMan\DTO
 */
class TouristDestination
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $totalStarRate;

    /**
     * ScrapingForBeginner constructor.
     * @param string $name
     * @param string $totalStarRate
     */
    public function __construct(string $name, string $totalStarRate)
    {
        $this->name = $name;
        $this->totalStarRate = $totalStarRate;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTotalStarRate(): string
    {
        return $this->totalStarRate;
    }
}
