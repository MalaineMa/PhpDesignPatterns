<?php
namespace App\Models;


abstract class Flower
{

    protected const NAME ='';
    protected const COLOR ='';

    /**
     * Get the value of name
     */
    public function getName()
    {
        return self::NAME;
    }  

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return self::COLOR;
    }

    public function render()
    {
        return "<span style='width:20px;height:20px;color:".self::COLOR."'>".self::NAME."</span>";
    }

}
