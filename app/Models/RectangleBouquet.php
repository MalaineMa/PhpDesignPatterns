<?php

namespace App\Models;


use App\Framework\Positions;


final class RectangleBouquet extends Bouquet
{
    protected array $positionsIndexes = [
        Positions::TOP_LEFT,
        Positions::TOP_RIGHT,
        Positions::BOTTOM_LEFT,
        Positions::BOTTOM_RIGHT,
    ];

}
