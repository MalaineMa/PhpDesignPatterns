<?php

namespace App\Framework;

enum Positions: String
{
    case TOP = 'top';
    case TOP_LEFT = 'top_left';
    case TOP_RIGHT = 'top_right';
    case LEFT = 'left';
    case RIGHT = 'right';
    case BOTTOM = 'bottom';
    case BOTTOM_LEFT = 'bottom_left';
    case BOTTOM_RIGHT = 'bottom_right';


    public function toString()
    {
        return 'TOP';
    }
}
