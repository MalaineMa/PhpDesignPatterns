<?php

namespace App\Framework;

use App\Models\Flower;


class Position
{
    /**
     * @var Flower[]
     */
    protected array $flowers = [];

    public function __construct(protected Positions $position)
    {
    }

    /**
     * @param Flower flower
     * @return int
     */
    public function add(Flower $flower): int
    {
        $count = array_push($this->flowers, $flower);
        shuffle($this->flowers);
        return $count;
    }

    /**
     * @param Flower[] flowers
     * @return int
     */
    public function push(array $flowers): int
    {
        $flowers = array_filter($flowers, fn ($flower) => $flower instanceof Flower);
        if (empty($flowers))
            throw new MissMatchTypeException("wrong Type it's not a flower");
        $this->flowers = [...$this->flowers, ...$flowers];
        return count($this->flowers);
    }

    public function getFlowers(): array
    {
        return $this->flowers;
    }

    public function getPosition(): Positions
    {
        return $this->position;
    }
}
