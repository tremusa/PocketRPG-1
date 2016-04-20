<?php

namespace RPG/neededstuff;

///////////////////
// Knight weapon //
///////////////////

use pocketmine/plugin/PluginBase;
use pocketmine/event/Listener;
use pocketmine/event/entity/EntityDamageByEntityEvent;
use pocketmine/event/entity/EntityDamageEvent;
use pocketmine/entity/Living;
use pocketmine/math/Vector3;
use pocketmine/level/Position;
use pocketmine/level/particle/LavaParticle;
use pocketmine/Player;
use pocketmine/Server;

class knightknive extends PluginBase implements Listener {
    
    public function onFight(EntityDamageEvent $event) {  
      if($event instanceof EntityDamageByEntityEvent && $event->getDamager() instanceof Player) {
        $hit = $event->getEntity();
        $damager = $event->getDamager();
        $level = $this->config->get("RPG_LEVEL");
        if($damager->getLevel() == $configlevel) {
          if($damager->getItemInHand()->getId() == 288) {
            $x = $hit->x;
            $y = $hit->y;
            $z = $hit->z;
            $hitpos = $hit->getPosition(new Vector3($x, $y, $z));
            $level->addParticle(new CritialParticle($hitpos));
            $this->setKnockBack(2);
            $this->setDamage(getDamage() + 5);
          }
        }
      }
  }
}
}
