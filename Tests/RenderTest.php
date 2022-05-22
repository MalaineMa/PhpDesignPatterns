<?php

use App\Framework\Positions;
use App\Framework\RenderNullValueException;
use App\Models\Bouquet;
use PHPUnit\Framework\TestCase;

class RenderTest extends TestCase
{


 private $bouquet;


 /** @test */
 public function test_render_whith_null_value()
 {
  $bouquet = new Bouquet();
  $this->expectException(RenderNullValueException::class);
  $position = $this->bouquet->renderPosition(null);
 }

 /** @test */
 public function test_render_whith_wrong_value()
 {
  $bouquet = new Bouquet();
  $this->expectException(RenderNullValueException::class);
  $position = $this->bouquet->renderPosition("flop");
 }
}
