<?php

declare(strict_types=1);

namespace WolfDen133\SimpleTR;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase{


    public function onEnable()
    {
        $commandmap = $this->getServer()->getCommandMap();
        $commandmap->register("SimpleTR", new TRCommand($this));
    }

}
