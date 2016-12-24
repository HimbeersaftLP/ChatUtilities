<?php
namespace himbeer\chatutilities;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\Server;
class main extends PluginBase implements Listener{
     
     public function onEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this,$this);
          $this->getLogger()->info("ChatUtilities by HimbeersaftLP enabled!");
     }
     
     public function onCommand(CommandSender $sender, Command $command, $label, array $args){
          switch($command->getName()){
               case "donothing":
                    break;
               case "broadcastmsg":
                    if(count($args) < 1){
                         return false;
                         break;
                    }else{
                         $args = str_replace("&nl", "\n", $args);
                         $args = str_replace("&", "§", $args);
                         $this->getServer()->broadcastMessage(implode(" ",$args));
                         break;
                    }
                    break;
               case "sendme":
                    if(count($args) < 1){
                         return false;
                         break;
                    }else{
                         $sname = $sender->getName();
                         $args = str_replace("&nl", "\n", $args);
                         $args = str_replace("&sender", $sname, $args);
                         $args = str_replace("&", "§", $args);
                         $sender->sendMessage(implode(" ",$args));
                         break;
                    }
                    break;
               case "broadcastpopup":
                    if(count($args) < 1){
                         return false;
                         break;
                    }else{
                         $args = str_replace("&nl", "\n", $args);
                         $args = str_replace("&", "§", $args);
                         $this->getServer()->broadcastPopup(implode(" ",$args));
                         break;
                    }
                    break;
               case "broadcasttip":
                    if(count($args) < 1){
                         return false;
                         break;
                    }else{
                         $args = str_replace("&nl", "\n", $args);
                         $args = str_replace("&", "§", $args);
                         $this->getServer()->broadcastTip(implode(" ",$args));
                         break;
                    }
                    break;
          }
          return true;
     }
}
