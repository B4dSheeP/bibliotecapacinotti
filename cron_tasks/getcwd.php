<?php


chdir("/home/biblioteve");
mail("christiancotignola@gmail.com", "prova", "CRON execution PATH : ".file_get_contents('www/libs/config.php'));
require_once("www/libs/config.php");



?>
