<?php

declare(strict_types=1);

namespace NurAzliYT\IronGolemSpawnEgg;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class IronGolemSpawnEgg extends PluginBase{
  protected function OnEnable(): void
  {
      GlobalItemDataHandlers::getDeserializer()->map(ItemTypeNames::IRON_GOLEM_SPAWM_EGG, fn() => self::IRON_GOLEM_SPAWN_EGG());
      GlobalItemDataHandlers::getSerializer()->map(self::IRON_GOLEM_SPAWN_EGG(), fn() => new SavedItemData(ItemTypeNames::IRON_GOLEM_SPAWN_EGG
  }

  public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
  {
      if(!$sender instanceof Player) {
          return false;
      }
      switch($command->getName()) {
        case 'irongolemspawn':
            $sender->getInventory()->setItem(0,self::IRON_GOLEM_SPAWN_EGG());
            return true;
            break;
        default:
            return false
            break;
        }
        return true
    }
    public static function IRON_GOLEM_SPAWN_EGG(): IronGolemSpawm{
        return new IronGolemSpawn(new ItemIndentifier(30000), 'iron Golem Spawm Egg');
}

class IronGolemSpawn extends SpawnEgg {
    public function createEntity(World $world, Vector3 $pos, float $yaw, float $pitch) : Entity{
        return new Iron_Golem(Location::formObject($pos, $world, $yaw, $pitch));
}
