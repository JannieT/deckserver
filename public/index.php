<?php

require __DIR__.'/../vendor/autoload.php';

$player = new App\Controller($_GET, $_POST);
$player->showRemote();

$theme = $player->theme;
$sections = $player->sections;
include '../views/layout.php';
