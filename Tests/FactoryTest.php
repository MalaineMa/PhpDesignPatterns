<?php

use App\Framework\Factory;
use App\Framework\MissMatchTypeException;
use App\Framework\Positions;
use App\Models\Bouquet;
use PHPUnit\Framework\TestCase;

class FactoryTest extends \PHPUnit\Framework\TestCase
{
    public function test_build_bouquet()
    {
        $bouquetName = 'simple';
        $list = [
            ['flower' => 'iris', 'position' => 'left', 'number' => 1]
        ];
        $bouquet = Factory::init($list)
            ->setBouquet($bouquetName)
            ->build();
        $this->assertInstanceOf(Bouquet::class, $bouquet);
        $this->assertEquals(1, count($bouquet->getPosition(Positions::LEFT)->getFlowers()));
    }

    public function test_build_empty_bouquet()
    {
        $bouquetName = 'simple';
        $list = [
            ['flower' => 'iris', 'position' => 'mm', 'number' => 1]
        ];
        $bouquet = Factory::init($list)
            ->setBouquet($bouquetName)
            ->build();
        $this->assertInstanceOf(Bouquet::class, $bouquet);
        $this->assertEquals(1, count($bouquet->getPosition(Positions::LEFT)->getFlowers()));
    }

    public function test_build_bouquet_with_unmatched_position()
    {
        $bouquetName = 'simple';
        $list = [
            ['flower' => 'iris', 'position' => 'top_left', 'number' => 1]
        ];
        $this->expectException(MissMatchTypeException::class);
        $bouquet = Factory::init($list)
            ->setBouquet($bouquetName)
            ->build();
    }
}
