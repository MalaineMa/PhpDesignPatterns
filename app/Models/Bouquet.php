<?php

namespace App\Models;

use App\Framework\Factory;
use App\Framework\Position;
use App\Framework\Positions;
use App\Framework\RenderNullValueException;
use phpDocumentor\Reflection\Types\Null_;

abstract class Bouquet
{
    protected array $positions = [];
    /**
     * @var Positions[]
     */
    protected array $positionsIndexes = [];


    public function __construct()
    {

        $this->positions = array_fill_keys(
            array_map(
                fn ($item) => $item->value,
                $this->positionsIndexes
            ),
            null

        );
        // var_dump($this->positions);

        //var_dump($this->positionsIndexes);

        /*var_dump($this->positionsIndexes);
      
        var_dump(Positions::BOTTOM, gettype(Positions::BOTTOM), is_object(Positions::BOTTOM));
        var_dump(Positions::BOTTOM->name);
        var_dump(Positions::BOTTOM->value);*/
    }
    /**
     * @return Positions[]
     */
    public function getPositions(): array
    {
        return $this->positionsIndexes;
    }

    public function getPosition(Positions $position): Position|null|false
    {
        $index =  $position->value; //["top"], ["left"], ["right"], ["bottom"]
        // var_dump($index . "\n");
        // echo "hy jaemis";


        //echo $index; $this->positions = ["top"]=> NULL ["left"]=> NULL ["right"]=> NULL ["bottom"]=> NULL
        if (!key_exists($index, $this->positions))
            return false;
        // var_dump($this->positions[$index]);
        //echo "lalapo";
        return   $this->positions[$index]; // positions["top"] =NUll

    }

    public function addPosition(Position $position): void
    {
        $this->positions[$position->getPosition()->value] = $position; // positions[TOP->value] =  positon["top"]

    }


    public  function render(): string
    {
        $positionHtmlArray = array_map(

            fn ($position) => $this->renderPosition(positionIndex: Positions::tryFrom($position)),
            array_keys($this->positions),
        );

        return "<div class='" . $this->getName() . "'>" . implode("", $positionHtmlArray) . "</div>";
        /*  if (array_values($positionHtmlArray) == Null) {
            throw new RenderNullValueException("Null Position");
        } else {
            return "<div class='" . $this->getName() . "'>" . implode("", $positionHtmlArray) . "</div>";
        }*/
    }


    private  function getName()
    {
        $path = explode('\\', __CLASS__);
        return array_pop($path);
    }



    private function renderPosition(Positions $positionIndex)
    {
        $position = $this->getPosition($positionIndex); //getPosition(TOP) => null
        if ($position != null) {
            $flowerHtmlArray = array_map(
                fn ($flower) => $flower->render(),
                $position->getFlowers()
            );

            return "<div class='" . $positionIndex->name . "'>" . implode("", $flowerHtmlArray) . "</div>";
        } else {
            // throw new RenderNullValueException("Null Position");
            return "";
        }

        /* $flowerHtmlArray = array_map(
            fn ($flower) => $flower->render(),
            $position->getFlowers()
        );
        return "<div class='" . $positionIndex . "'>" . implode("", $flowerHtmlArray) . "</div>";*/
    }
}
