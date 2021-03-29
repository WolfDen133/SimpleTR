<?php

namespace WolfDen133\SimpleTR;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class TRCommand extends Command
{
    /** @var Main */
    public $plugin;

    public function __construct(Main $main)
    {
        $this->plugin = $main;

        parent::__construct("tellraw");

        $this->setPermissionMessage(TextFormat::RED . "Unknown command. Try /help for a list of commands");
        $this->setPermission("tellraw.command.use");
        $this->setAliases(["tr"]);
        $this->setDescription("Send a player a message without any formatting");
        $this->setUsage("Usage: /tellraw {player} (message...)");

    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender->hasPermission($this->getPermission())) {
            if (count($args) >= 2) {
                switch ($args[0]) {
                    case "@a":
                        foreach ($this->plugin->getServer()->getOnlinePlayers() as $player) {
                            $player->sendMessage(implode(" ", array_splice($args, 1)));
                        }
                    break;
                    case "@s":
                        $sender->sendMessage(implode(" ", array_splice($args, 1)));
                    break;
                    case "@r":
                        $players = $this->plugin->getServer()->getOnlinePlayers();
                        if (count($players) > 0){
                            $players[mt_rand(0, count($players)-1)]->sendMessage(implode(" ", array_splice($args, 1)));
                        }
                    break;
                    default:
                        $targets = explode(",", $args[0]);
                        foreach ($targets as $player) {
                            $target = $this->plugin->getServer()->getPlayer($player);
                            if ($target instanceof Player) {
                                $target->sendMessage(implode(" ", array_splice($args, 1)));
                            } else {
                                $sender->sendMessage(TextFormat::RED . "The player '$player' cannot be found.");
                            }
                        }
                    break;
                }
            } else {
                $sender->sendMessage($this->getUsage());
            }
        } else {
            $sender->sendMessage($this->getPermissionMessage());
        }
    }
}