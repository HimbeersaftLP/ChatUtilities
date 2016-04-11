<?php
namespace himbeer\chatutilities;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\Server;
class Main extends PluginBase implements Listener{
     
     public function onEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this,$this);
          $this->getLogger()->info("ChatUtilities by HimbeersaftLP enabled!");
     }
     
     public function onCommand(CommandSender $sender, Command $command, $label, array $args){
          switch($command->getName()){
               case "nothing":
                    break;
               case "easybroadcast":
                    if(count($args) < 1){
                         $sender->sendMessage("Usage: /easybroadcast [message]");
                    }elseif($sender->hasPermission("chatu.ebcast")){
                         $this->getServer()->broadcastMessage(implode(" ",$args));
                    }else{
                         $sender->sendMessage("You don't have the permission to perform this command!");
                    }
                    break;
               case "sendme":
                    if(count($args) < 1){
                         $sender->sendMessage("Usage: /sendme [message]");
                    }elseif($sender->hasPermission("chatu.sendme")){
                         $sender->sendMessage(implode(" ",$args));
                    }else{
                         $sender->sendMessage("You don't have the permission to perform this command!");
                    }
          }
          return true;
     }
}
