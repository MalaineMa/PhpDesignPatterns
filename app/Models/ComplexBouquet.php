<?php

namespace App\Models;

use App\Framework\Positions;

final class ComplexBouquet extends Bouquet
{
    protected array $positionsIndexes = [
        Positions::TOP,
        Positions::LEFT,
        Positions::RIGHT,
        Positions::BOTTOM,
        Positions::TOP_LEFT,
        Positions::TOP_RIGHT,
        Positions::BOTTOM_LEFT,
        Positions::BOTTOM_RIGHT,
    ];



   
}
