<?php

namespace BNTFeujjj\fAntiFallingLeaf;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\LeavesDecayEvent;

class Main extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
    }

    public function onLeavesDecay(LeavesDecayEvent $event)
    {
        $config = $this->getConfig();
        $block = $event->getBlock();
        if (in_array($block->getPosition()->getWorld()->getFolderName(), $config->get("worlds", []))) {
            $event->cancel();
        }
    }
}