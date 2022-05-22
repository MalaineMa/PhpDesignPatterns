<?php

use App\Framework\Facade;
use App\Framework\MissMatchTypeException;
use App\Framework\Position;
use App\Framework\Positions;
use App\Models\ComplexBouquet;
use App\Models\SimpleBouquet;
use phpDocumentor\Reflection\DocBlock\Tags\Since;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{


    public function test_make_position()
    {
        $position = Facade::make('iris', 1, Positions::TOP);
        $this->assertEquals(1, count($position->getFlowers()));
    }



    public function test_update_position()
    {
        $position = Facade::update('iris', 1, new Position(Positions::TOP));
        $this->assertEquals(1, count($position->getFlowers()));
    }

    public function test_make_position_with_capital_flower_name()
    {
        $position = Facade::make('IRIS', 1, Positions::TOP);
        $this->assertEquals(1, count($position->getFlowers()));
    }

    public function test_make_position_with_unmapped_flower_name()
    {
        $this->expectException(MissMatchTypeException::class);
        $position = Facade::make('lily', 1, Positions::TOP);
    }

    public function test_make_bouquet()
    {
        $list = [
            ['flower' => 'iris', 'position' => 'left', 'number' => 1]
        ];
        $bouquet = new ComplexBouquet();
        Facade::makeBouquet($bouquet, $list);
        $this->assertEquals(1, count($bouquet->getPosition(Positions::LEFT)->getFlowers()));
    }

    public function test_make_bouquet_with_wrong_position()
    {
        $this->expectException(MissMatchTypeException::class);
        $list = [
            ['flower' => 'iris', 'position' => 'top_left', 'number' => 1]
        ];
        $bouquet = new SimpleBouquet();
        Facade::makeBouquet($bouquet, $list);
    }
}
