<?php

  $ign = $_GET['ign'];

  include_once('HypixelPHP.php');
  $HypixelPHP = new HypixelPHP\HypixelPHP(['api_key' => 'e57df3b0-5f54-4d7d-9243-e4cf4a8afb46']);
  $player = $HypixelPHP->getPlayer([\HypixelPHP\KEYS::PLAYER_BY_NAME => $ign]);
  if ($player == null) {
    echo '<script type="text/javascript">alert("Invalid name! Please try again");history.go(-1);</script>';
  } else {
    header("Location: /stats/player/index.php?ign=$ign");
  }
?>