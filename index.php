<?php
//IP adresa k pingu. Skopiruj z hostify
$IP = "neco.hostify.cz:port";
//IP ktora sa má zobrazovať
$SHOWED_IP = "neco.mujserver.cz";
//Zobrazovať hračov True/False
$SHOW_PLAYERS = True;
//Velkost avatara na zobrazenie
$Avatar_SIZE = 20;
//Get the status and decode the JSON
$status = json_decode(file_get_contents("https://api.mcsrvstat.us/2/".$IP));

//Show the version
echo "IP: ". $SHOWED_IP;
echo "<br>Verzia: ".$status->version."";
echo "<br>Online: ".$status->players->online."/". $status->players->max;


//Show a list of players
if ($SHOW_PLAYERS == True || $status->players->online == 0) {
  echo "<br>Hraci Online: </br>";
  foreach ($status->players->list as $player) {

    //echo $player.'<br />';
    echo "<br> <img src='http://cravatar.eu/helmhead/".$player."/".$Avatar_SIZE.".png'> <b>".$player."</b>";
  }
}
?>
