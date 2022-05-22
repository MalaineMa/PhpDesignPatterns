<?php

namespace App\Models;


use App\Framework\Positions;


final class SimpleBouquet extends Bouquet
{
    protected array $positionsIndexes = [
        Positions::TOP,
        Positions::LEFT,
        Positions::RIGHT,
        Positions::BOTTOM,
    ];

}
