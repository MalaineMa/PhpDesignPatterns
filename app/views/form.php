<?php

use App\Framework\Factory;
use App\Models\Bouquet;

?>



<div class="container">
    <form method="post" action="">

        <div class="row">

            Type of flower :
            <select class="inp" id="flower" name="flower">
                <?php
                foreach (Factory::getPossibleFlowers() as $flower) :
                ?>
                    <option value="<?= $flower ?>"><?= str_replace('_', '', $flower) ?></option>
                <?php
                endforeach
                ?>
            </select>
        </div>
        <div class="row">
            Number of flower :
            <input class="inp" type="number" value="1" id="number_flower" name="number" min="1" max="10">
        </div>
        <div class="row">
            Position : <br>
            <select id="position" name="position" class="inp">
                <?php
                /**
                 * @var Bouquet $myBouquet
                 */
                foreach ($myBouquet->getPositions() as $position) :
                ?>
                    <option><?= $position->value ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="row">
            <input class="button" type="submit" name="envoyer" value="Envoyer" />
        </div>
    </form>
</div>