<?php

namespace App\Framework;

use App\Models\Bouquet;

final class Factory
{
    private static  self|null $_instance = null;

    private Bouquet $bouquet;

    private function __construct(protected array $list)
    {
    }

    public static function init(array $list): self
    {
        if (self::$_instance !== null)
            self::$_instance->push($list);
        else
            self::$_instance =  new static($list);
        return self::$_instance;
    }

    public static function getPossibleBouquets(): array
    {
        return array_keys(Facade::$mapBouquet);
    }

    public static function getPossibleFlowers(): array
    {
        return array_keys(Facade::$map);
    }


    public  function getPossiblePositions(): array
    {
        return $this->bouquet->getPositions();
    }

    public function build(): Bouquet
    {

        $list = array_filter(
            $this->list,
            fn ($item) =>
            is_string($item["flower"])
                && is_numeric($item['number'])
                && !is_null(Positions::tryFrom(value: $item['position']))
        );
        return Facade::makeBouquet($this->bouquet, $list);
    }

    private function push(array $list)
    {
        $this->list = [...$this->list, ...$list];
    }

    /**
     * Set the value of bouquet
     *
     * @return  self
     */
    public function setBouquet(string $bouquetName)
    {
        if (!key_exists($bouquetName, Facade::$mapBouquet))
            throw new MissMatchTypeException("Wrong bouquet name");
        $this->bouquet = new Facade::$mapBouquet[$bouquetName];

        return $this;
    }
}
