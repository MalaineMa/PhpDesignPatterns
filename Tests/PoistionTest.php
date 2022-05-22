<?php

use App\Framework\MissMatchTypeException;
use function PHPUnit\Framework\assertEquals;
use App\Models\Iris;
use App\Models\Rose;
use App\Models\SunFlower;
use App\Framework\Position;
use App\Framework\Positions;
use PHPUnit\Framework\TestCase;

class PositionsTest extends TestCase
{
    public function test_add_flower_to_position()
    {
        $position = new Position(position: Positions::TOP);
        $position->add(flower: new Rose());
        $position->add(flower: new Iris());
        $count = $position->add(flower: new SunFlower());
        $this->assertEquals($count, 3);
    }

    public function test_add_and_push_flower_to_position()
    {
        $position = new Position(position: Positions::TOP);
        $position->add(flower: new Rose());
        $position->add(flower: new Iris());
        $count = $position->add(flower: new SunFlower());
        $this->assertEquals($count, 3);
        $flowers = [new Rose(), new Iris()];
        $count = $position->push(flowers: $flowers);
        $this->assertEquals($count, 5);
    }

    public function test_push_non_flower_to_position()
    {
        $position = new Position(position: Positions::TOP);
        $flowers = [new \stdClass(), new \stdClass()];
        $this->expectException(MissMatchTypeException::class);
        $position->push(flowers: $flowers);
    }

    public function test_push_non_flower_and_flower_to_position()
    {
        $position = new Position(position: Positions::TOP);
        $flowers = [new Rose(), new \stdClass()];
        $count = $position->push(flowers: $flowers);
        $this->assertEquals($count, 1);
    }
}
