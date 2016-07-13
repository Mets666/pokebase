<?php

/**
 * Created by PhpStorm.
 * User: sadlom01
 * Date: 13/07/2016
 * Time: 10:11
 */

namespace AppBundle\Calculation;

use AppBundle\Entity\Pokemon;

class StatCalculator
{
    public function Calcul($parsed, Pokemon $pokemon)
    {
        $stats['hp'] = $this->hpCalcul($parsed['stats']['hp'], $pokemon->getIvHp(), $pokemon->getEvHp(), $pokemon->getLevel());
        $stats['atk'] = $this->statCalcul($parsed['stats']['attack'], $pokemon->getIvAtk(), $pokemon->getEvAtk(), $pokemon->getLevel());
        $stats['def'] = $this->statCalcul($parsed['stats']['defense'], $pokemon->getIvDef(), $pokemon->getEvDef(), $pokemon->getLevel());
        $stats['spatk'] = $this->statCalcul($parsed['stats']['special-attack'], $pokemon->getIvSpatk(), $pokemon->getEvSpatk(), $pokemon->getLevel());
        $stats['spdef'] = $this->statCalcul($parsed['stats']['special-defense'], $pokemon->getIvSpdef(), $pokemon->getEvSpdef(), $pokemon->getLevel());
        $stats['spd'] = $this->statCalcul($parsed['stats']['speed'], $pokemon->getIvSpd(), $pokemon->getEvSpd(), $pokemon->getLevel());
        
        return $stats;
    }

    public function hpCalcul($base, $iv, $ev, $level)
    {
        return ((2 * $base + $iv + ($ev/4)) * $level /100) + $level + 10;
    }

    public function statCalcul($base, $iv, $ev, $level)
    {
        //edit
        return ((2 * $base + $iv + ($ev/4)) * $level /100) + $level + 10;
    }
}