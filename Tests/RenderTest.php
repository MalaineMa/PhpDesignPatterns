<?php

use App\Models\Bouquet;
use App\Framework\Factory;
use App\Framework\Positions;
use PHPUnit\Framework\TestCase;
use App\Framework\RenderNullValueException;

use function PHPUnit\Framework\assertEquals;

class RenderTest extends TestCase
{


  private $bouquet;


  /** @test */
  public function test__whith_null_value_position()
  {
    $Classbouquet = new Bouquet();

    $bouquetName = 'simple';
    $list = [
      ['flower' => 'iris', 'position' => NULL, 'number' => 1]
    ];

    $this->expectException(RenderNullValueException::class);
    $bouquet = Factory::init($list)
      ->setBouquet($bouquetName)
      ->build()
      ->render();
  }




  /** @test */
  public function test_renderPosition()
  {
    $Classbouquet = new Bouquet();

    $bouquetName = 'simple';
    $list = [
      ['flower' => 'iris', 'position' => 'left', 'number' => 1]
    ];
    $bouquet = Factory::init($list)
      ->setBouquet($bouquetName)
      ->build();
    $positionIndex = $list['position']; //left
    $position = $this->Classbouquet->getPosition($positionIndex); //LEFT
    $this->assertInstanceOf(Positions::class, $position);
    $this->Classbouquet->renderPosition($position);
  }

  /** @test */
  public function test_render2()
  {
    $Classbouquet = new Bouquet();

    $bouquetName = 'simple';
    $list = [
      ['flower' => 'iris', 'position' => 'top', 'number' => 1]
    ];
    $bouquet = Factory::init($list)
      ->setBouquet($bouquetName)
      ->build();
    $positionIndex = $list['position'];
    $position = $this->Classbouquet->getPosition($positionIndex);
    $this->assertInstanceOf(Positions::class, $position);
    $this->assertEquals("iris", $bouquet->render());
  }
}
