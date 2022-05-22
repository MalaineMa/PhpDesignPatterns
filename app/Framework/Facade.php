<?php

namespace App\Framework;

use App\Models\Bouquet;
use App\Models\ComplexBouquet;
use App\Models\Flower;
use App\Models\Iris;
use App\Models\RectangleBouquet;
use App\Models\Rose;
use App\Models\SimpleBouquet;
use App\Models\SunFlower;

class Facade
{

    public static $mapBouquet = [
        'simple' => SimpleBouquet::class,
        'rectangular' => RectangleBouquet::class,
        'complex' => ComplexBouquet::class,
    ];

    public static $map = [
        'iris' => Iris::class,
        'rose' => Rose::class,
        'sun_flower' => SunFlower::class,
    ];

    public static function makeBouquet(Bouquet $bouquet, array $listFlowers): Bouquet
    {
        array_walk(
            $listFlowers,
            function ($item) use ($bouquet) {
                $positionIndex = Positions::from(value: $item['position']);
                $position = $bouquet->getPosition(position: $positionIndex);
                if ($position === false)
                    throw new MissMatchTypeException("Wrong position");
                $bouquet->addPosition(self::buildBouquet($position, $positionIndex, $item));
            }
        );
        return $bouquet;
    }

    private static function buildBouquet(Position|null $position, Positions $positionIndex, array $item): Position
    {
        if ($position === null)
            $position = self::make(
                position: $positionIndex,
                flower: $item["flower"],
                number: $item["number"]
            );
        else
            $position = self::update(
                position: $position,
                flower: $item["flower"],
                number: $item["number"]
            );
        return $position;
    }

    public static function make(string $flower, int $number, Positions $position): Position
    {
        $position = new Position($position);
        return self::update(flower: $flower, number: $number, position: $position);
    }

    public static function update(string $flower, int $number, Position $position): Position
    {
        $flower  = strtolower($flower);
        if (!array_key_exists($flower, self::$map))
            throw new MissMatchTypeException("Wrong flower name");
        $flowerClassName = self::$map[$flower];

        if ($number === 1)
            $position->add(new $flowerClassName);
        else
            $position->push(self::makeArray(flower: $flowerClassName, number: $number));
        return $position;
    }

    /**
     * @param string flower
     * @param string $number
     * @return Flower[]
     */
    protected static function makeArray(string $flower, int $number): array
    {
        return array_fill(0, $number, new $flower);
    }
}
