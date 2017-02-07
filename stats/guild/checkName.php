<?php

  $ign = $_GET['ign2'];

  include_once('HypixelPHP.php');
  $HypixelPHP = new HypixelPHP\HypixelPHP(['api_key' => 'e57df3b0-5f54-4d7d-9243-e4cf4a8afb46']);
  $guild = $HypixelPHP->getGuild([\HypixelPHP_Mongo\KEYS::GUILD_BY_PLAYER_NAME => $ign]);
  if ($guild == null) {
    echo '<script type="text/javascript">alert("Invalid guildname! Please try again");history.go(-1);</script>';
  } else {
    header("Location: /stats/guild/index.php?ign=$ign");
  }
  
?>