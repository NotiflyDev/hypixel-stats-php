<head>
	<title>Notifly's Website</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="/assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
  <link rel="icon" href="/assets/favicon.ico">
</head>

  <?php
    
    $ign = $_GET['ign'];
    
    include_once('HypixelPHP.php');
    include_once('HypixelPHP_Mongo.php');
    include('MinecraftUUID.php');
    
    $HypixelPHP = new HypixelPHP\HypixelPHP(['api_key' => 'e57df3b0-5f54-4d7d-9243-e4cf4a8afb46']);
    // get a player object using the hypixel api object
    $player = $HypixelPHP->getPlayer([\HypixelPHP\KEYS::PLAYER_BY_NAME => $ign]);
    $guild = $HypixelPHP->getGuild([\HypixelPHP_Mongo\KEYS::GUILD_BY_PLAYER_NAME => $ign]);
    if ($player == null) {
      echo '<script type="text/javascript">alert("Invalid name! Please try again");history.go(-1);</script>';
      } else {?>

<body>

	<!-- Header -->
		<div id="header">

			<div class="top">

				<!-- Logo -->
                    <div id="logo">
                        <?php
                          $profile = ProfileUtils::getProfile($ign);
                            if ($profile != null) {
                              $result = $profile->getProfileAsArray();
                              $uuidPlayer = $result['uuid'];
                        ?>
                          <span style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)" class="image avatar48"><img src="https://minotar.net/avatar/<?php echo $ign; ?>" alt=""></span>

                        <?php
                          }
                        ?>
                        <a href="/"><h1 id="title"><?php echo $player->getName(); ?></h1>
                        <p><?php echo $player->getRank()->getCleanName(); ?></p></a>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
                            <li><a href="#search" id="search-link" class="skel-layers-ignoreHref"><span class="icon fa-search"><strong style="color: #888">Search</strong></span></a></li>
                            <li><a href="#general" id="gen-link" class="skel-layers-ignoreHref"><span class="icon fa-cogs">General Stats</span></a></li>                                
                            <li><a href="#sw" id="sw-link" class="skel-layers-ignoreHref"><span class="icon fa-cloud">Skywars</span></a></li>
                            <li><a href="#mw" id="mw-link" class="skel-layers-ignoreHref"><span class="icon fa-bank">Mega Walls</span></a>
                                <ul>
                                    <li><a href="#mw1" class="skel-layers-ignoreHref"><span class="icon fa-minus">Normal Classes</span></a></li>
                                    <li><a href="#mw2" class="skel-layers-ignoreHref"><span class="icon fa-minus">Hero Classes</span></a></li>
                                    <li><a href="#mw3" class="skel-layers-ignoreHref"><span class="icon fa-minus">Mythical Classes</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#wl" id="wl-link" class="skel-layers-ignoreHref"><span class="icon fa-magic">Warlords</span></a>
                                <ul style="">
                                    <li><a href="#wl1" class="skel-layers-ignoreHref"><span class="icon fa-minus">Classes</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#bsg" id="bsg-link" class="skel-layers-ignoreHref"><span class="icon fa-legal">Blitz Survival Games</span></a>
                            <ul style="">
                                    <li><a href="#bsg1" class="skel-layers-ignoreHref"><span class="icon fa-minus">Basic Kits</span></a></li>
                                    <li><a href="#bsg2" class="skel-layers-ignoreHref"><span class="icon fa-minus">Advanced Kits</span></a></li>
                                </ul>
                            </li>
                            <li><a href="#uhc" id="uhc-link" class="skel-layers-ignoreHref"><span class="icon fa-map-o">UHC Champions</span></a></li>
                            <li><a href="#sc" id="sc-link" class="skel-layers-ignoreHref"><span class="icon fa-bolt">Skyclash</span></a></li>
                            <li><a href="#qc" id="qc-link" class="skel-layers-ignoreHref"><span class="icon fa-crosshairs">Quakecraft</span></a></li>
                            <li><a href="#wa" id="wa-link" class="skel-layers-ignoreHref"><span class="icon fa-th-large">Walls</span></a></li>
                            <li><a href="#ac" id="ac-link" class="skel-layers-ignoreHref"><span class="icon fa-soccer-ball-o">Arcade</span></a></li>
                            <li><a href="#tkr" id="tkr-link" class="skel-layers-ignoreHref"><span class="icon fa-flag-checkered">Turbo Kart Racers</span></a></li>
                            <li><a href="#vz" id="vz-link" class="skel-layers-ignoreHref"><span class="icon fa-street-view">VampireZ</span></a></li>
                            <li><a href="#sh" id="sh-link" class="skel-layers-ignoreHref"><span class="icon fa-star">Smash Heroes</span></a></li>
                            <li><a href="#tnt" id="tnt-link" class="skel-layers-ignoreHref"><span class="icon fa-bomb">TNT Games</span></a></li>
                            <li><a href="#cvc" id="cvc-link" class="skel-layers-ignoreHref"><span class="icon fa-fighter-jet">Cops vs Crims</span></a></li>
                            <li><a href="#pb" id="pb-link" class="skel-layers-ignoreHref"><span class="icon fa-circle-o">Paintball</span></a></li>
                            <li><a href="#cw" id="cw-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Crazy Walls</span></a></li>
                            <li><a href="#suhc" id="suhc-link" class="skel-layers-ignoreHref"><span class="icon fa-map">Speed UHC</span></a></li>
                            <li><a href="#ab" id="ab-link" class="skel-layers-ignoreHref"><span class="icon fa-random">Arena Brawl</span></a></li>
						</ul>
					</nav>

			</div>

			<div class="bottom">

				<!-- Social Icons -->
					<ul class="icons">
						<li><a href="https://twitter.com/Notifly_" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.youtube.com/channel/UC3y2pYjjQ1OqSqvRmqSaA7w" target="_blank" class="icon fa-youtube-play"><span class="label">YouTube</span></a></li>
						<li><a href="https://github.com/NotiflyAPI" target="_blank" class="icon fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="http://steamcommunity.com/id/notifly" target="_blank" class="icon fa-steam"><span class="label">Steam</span></a></li>
						<li><a href="https://hypixel.net/members/notifly.398521/" target="_blank" class="icon fa-envelope"><span class="label">Hypixel Forums</span></a></li>
					</ul>

			</div>

		</div>

	<!-- Main -->
		<div id="main">
      <!-- Stats -->
            <section id="search" class="four">
                <div class="container">
                    <header>
                        <span class="icon fa-cogs fa-2x"><h2><?php echo $player->getName(); ?>'s Stats</h2></span>
                        <span><img src="https://crafatar.com/renders/head/<?php echo $ign; ?>?helm&scale=10" alt=""></span>
                    </header>

                    <p>Search again:</p>

                    <form method="get" action="/stats/player/index.php">
                        <div class="row">
                            <div class="12u$">
                                <input type="text" name="ign" placeholder="Username" autocomplete="off" />
                            </div>
                            <div class="12u$">
                                <input type="submit" value="Submit" />
                            </div>

                        </div>
                    </form>

                    </div>
				</section>
		
      
			<!-- General Stats -->
				<section id="general" class="">
					<div class="container">
						<header>
							<h2>General Stats</h2>
                        </header>
                        <article class="item">
                            <p>
                                <?php
                                    echo 'Hypixel Level: <strong>' , $player->getInt('networkLevel')+1 , '</strong>';
                                    echo '<br>';
                                    echo 'Achievement Points: <strong>' , $player->getInt('achievementPoints') , '</strong>';
                                    echo '<br>';
                                    echo 'Karma: <strong>' , number_format($player->getInt('karma')) , '</strong>';
                                    echo '<br>';
                                    echo 'Rank: <strong>' , $player->getRank()->getCleanName() , '</strong>';
                                    echo '<br>';
                                    if ($guild != null) {
                                      echo "<a href=\"/stats/guild/index.php?ign=" . $player->getName() . "\"> Guild: <strong>" . $guild->getName() . "</strong></a>";
                                      echo '<br>';
                                      if ($guild->canTag()) {
                                          echo 'Guild Tag: <strong>[' . $guild->getTag() . ']</strong>';
                                      }
                                    }
                                ?>
                            </p>
                        </article>
					</div>
				</section>

			<!-- Specific Game Stats -->
				<section id="sw" class="two">
					<div class="container">

						<header>
							<h2>Skywars</h2>
						</header>
            
            <article class="item">
              <p>
                <?php
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths');
                  echo 'KDR: <strong>' . round($kdr, 2) . '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('coins')) , '</strong>';
                  echo '<hr>';
                  echo '<strong><h3>Per mode stats</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left"> Mode </th>';
                          echo '<th align="left"> Wins </th>';
                          echo '<th align="left"> Kills </th>';
                          echo '<th align="left"> KDR </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Solo</b></td>';
                          $mode = "solo";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_' . $mode))  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)) . '</td>';
                          $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths_' . $mode);
                          echo '<td>' . round($kdr, 2) . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Teams</b></td>';
                          $mode = "team";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_' . $mode))  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)) . '</td>';
                          $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths_' . $mode);
                          echo '<td>' . round($kdr, 2) . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Mega</b></td>';
                          $mode = "mega";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_' . $mode))  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)) . '</td>';
                          $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode)/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths_' . $mode);
                          echo '<td>' . round($kdr, 2) . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Ranked</b></td>';
                          $mode = "ranked";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_' . $mode . '_normal')) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode . '_normal')) . '</td>';
                          $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_' . $mode . '_normal')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths_' . $mode . '_normal');
                          echo '<td>' . round($kdr, 2) . '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                  echo '<hr>';
                  echo '<strong><h3>Mega skywars kits</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left"> Kit </th>';
                          echo '<th align="left"> Level </th>';
                          echo '<th align="left"> Kills </th>';
                          echo '<th align="left"> Wins </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Armorer</b></td>';
                          $kit = "armorer";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Armorsmith</b></td>';
                          $kit = "armorsmith";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Baseballer</b></td>';
                          $kit = "baseball-player";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Cannoneer</b></td>';
                          $kit = "cannoneer";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Healer</b></td>';
                          $kit = "healer";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Hunter</b></td>';
                          $kit = "hunter";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Knight</b></td>';
                          $kit = "knight";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Paladin</b></td>';
                          $kit = "paladin";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Scout</b></td>';
                          $kit = "scout";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Skeletor</b></td>';
                          $kit = "skeletor";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Witch</b></td>';
                          $kit = "witch";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Hellhound</b></td>';
                          $kit = "hellhound";
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kit_mega_mega_' . $kit)+1)  . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills_kit_mega_mega_' . $kit)) . '</td>';
                          echo '<td>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins_kit_mega_mega_' . $kit))  . '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="mw" class="three">
					<div class="container">

						<header>
							<h2>Mega Walls</h2>
						</header>

            <article class="item">
              <p>
                <?php 
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  echo 'Finals: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt('finalKills')) , '</strong>';
                  echo '<br>';
                  echo 'Loses: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt('losses')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt('coins')) , '</strong>';
                  echo '<hr id="mw1">';
                  echo '<strong><h3>Normal classes</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left"> Class </th>';
                          echo '<th align="left"> Kills </th>';
                          echo '<th align="left"> Finals </th>';
                          echo '<th align="left"> Wins </th>';
                          echo '<th align="left"> Level </th>';
                          echo '<th align="left"> Enderchest </th>';
                          echo '<th align="left"> Prestige </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Herobrine</b></td>';
                          $class = "herobrine";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Squid</b></td>';
                          $class = "squid";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Enderman</b></td>';
                          $class = "enderman";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Zombie</b></td>';
                          $class = "zombie";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Skeleton</b></td>';
                          $class = "skeleton";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Spider</b></td>';
                          $class = "spider";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Creeper</b></td>';
                          $class = "creeper";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                  echo '<hr id="mw2">';
                  echo '<strong><h3>Hero classes</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left" position="absolute"> Class </th>';
                          echo '<th align="left"> Kills </th>';
                          echo '<th align="left"> Finals </th>';
                          echo '<th align="left"> Wins </th>';
                          echo '<th align="left"> Level </th>';
                          echo '<th align="left"> Enderchest </th>';
                          echo '<th align="left"> Prestige </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Arcanist</b></td>';
                          $class = "arcanist";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Dreadlord</b></td>';
                          $class = "dreadlord";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Blaze</b></td>';
                          $class = "blaze";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td><b>Golem</b></td>';
                          $class = "golem";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Pigman</b></td>';
                          $class = "pigman";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Hunter</b></td>';
                          $class = "hunter";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Pirate</b></td>';
                          $class = "pirate";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Shaman</b></td>';
                          $class = "shaman";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                  echo '<hr id="mw3">';
                  echo '<strong><h3>Mythical classes</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left"> Class </th>';
                          echo '<th align="left"> Kills </th>';
                          echo '<th align="left"> Finals </th>';
                          echo '<th align="left"> Wins </th>';
                          echo '<th align="left"> Level </th>';
                          echo '<th align="left"> Enderchest </th>';
                          echo '<th align="left"> Prestige </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Moleman</b></td>';
                          $class = "moleman";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Werewolf</b></td>';
                          $class = "werewolf";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Phoenix</b></td>';
                          $class = "phoenix";
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_total_final_kills')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_wins')) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_a')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_b')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_c')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_d')) , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_g')) , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_enderchest_level') , '</td>';
                          echo '<td>' , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->getInt($class . '_prestige_level') , '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="wl" class="four">
					<div class="container">

						<header>
							<h2>Warlords</h2>
						</header>

            <article class="item">
              <p>
                <?php 
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  echo 'Total damage: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('damage')) , '</strong>';
                  echo '<br>';
                  echo 'Total healing: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('heal')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('coins')) , '</strong>';
                  echo '<hr id="wl1">';
                  echo '<strong><h3>Classes</h3></strong>';
                  echo '<div class="overflow">';
                  echo '<table>';
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo '<th align="left"> Class </th>';
                          echo '<th align="left"> Level </th>';
                          echo '<th align="left"> Wins </th>';
                          echo '<th align="left"> Damage </th>';
                          echo '<th align="left"> Healing </th>';
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                        echo '<tr>';
                          echo '<td><b>Paladin</b></td>';
                          $class = "paladin";
                          for ($counter = 1; $counter < 6; $counter++) {
                            $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_skill' . $counter);
                          }
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_health');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_energy');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_cooldown');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critchance');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critmultiplier');
                          echo '<td>' , $level , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('wins_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('damage_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('heal_' . $class)) , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Mage</b></td>';
                          $level = 0;
                          $class = "mage";
                          for ($counter = 1; $counter < 6; $counter++) {
                            $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_skill' . $counter);
                          }
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_health');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_energy');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_cooldown');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critchance');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critmultiplier');
                          echo '<td>' , $level , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('wins_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('damage_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('heal_' . $class)) , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Warrior</b></td>';
                          $level = 0;
                          $class = "warrior";
                          for ($counter = 1; $counter < 6; $counter++) {
                            $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_skill' . $counter);
                          }
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_health');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_energy');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_cooldown');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critchance');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critmultiplier');
                          echo '<td>' , $level , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('wins_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('damage_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('heal_' . $class)) , '</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td><b>Shaman</b></td>';
                          $level = 0;
                          $class = "shaman";
                          for ($counter = 1; $counter < 6; $counter++) {
                            $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_skill' . $counter);
                          }
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_health');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_energy');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_cooldown');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critchance');
                          $level = $level + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt($class . '_critmultiplier');
                          echo '<td>' , $level , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('wins_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('damage_' . $class)) , '</td>';
                          echo '<td>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->getInt('heal_' . $class)) , '</td>';
                        echo '</tr>';
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="bsg" class="two">
					<div class="container">

						<header>
							<h2>Blitz</h2>
						</header>

            <article class="item">
              <p>
                <?php 
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo 'Deaths: <strong>' . $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('deaths') , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt('coins')) , '</strong>';
                  echo '<hr id="bsg1">';
                  echo '<strong><h3>Basic kits</h3></strong>';
                  echo '<div class="overflow">';
                  echo "<table style=\"width: 50%; margin-left:auto; margin-right:auto; text-align:center;\">";
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo "<th style=\"text-align:center;\"> Kit </th>";
                          echo "<th style=\"text-align:center;\"> Level </th>";
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                          $kits = array("archer","armorer","baker","fisherman","hunter","hype train","knight","meatmaster","scout","speleologist");
                          foreach ($kits as &$kit) {
                            if ($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt($kit) != 0) {
                              $bsg_bk_checker = 1;
                              echo '<tr>';
                              echo "<td style=\"text-align:center;\"><b>" . $kit . "</b></td>";
                              echo "<td style=\"text-align:center;\">" , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt($kit) + 1 , "</td>";
                              echo '</tr>';
                            }
                          }
                          if ($bsg_bk_checker == 0 ){
                              echo '<tr>';
                              echo "<td style=\"text-align:center;\"><b>" . "null" . "</b></td>";
                              echo "<td style=\"text-align:center;\">" , "null" , "</td>";
                              echo '</tr>';
                            }
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                  
                  echo '<hr id="bsg1">';
                  echo '<strong><h3>Advanced kits</h3></strong>';
                  echo '<div class="overflow">';
                  echo "<table style=\"width: 50%; margin-left:auto; margin-right:auto; text-align:center;\">";
                    echo '<thread>';
                      echo '<thead>';
                        echo '<tr>';
                          echo "<th style=\"text-align:center;\"> Kit </th>";
                          echo "<th style=\"text-align:center;\"> Level </th>";
                        echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                          $kits = array("arachnologist","astronaut","blaze","creepertamer","farmer","florist","golem","horsetamer","jockey","necromancer","paladin","pigman","reaper","reddragon","rouge","shadow knight","slimeyslime","snowman","tim","toxicologist","troll","wolftamer");
                          foreach ($kits as &$kit) {
                            if ($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt($kit) != 0) {
                            $bsg_ak_checker = 1;
                              echo '<tr>';
                              echo "<td style=\"text-align:center;\"><b>" . $kit . "</b></td>";
                              echo "<td style=\"text-align:center;\">" , $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->getInt($kit) + 1 , "</td>";
                              echo '</tr>';
                            }
                          }
                          if ($bsg_ak_checker == 0 ){
                              echo '<tr>';
                              echo "<td style=\"text-align:center;\"><b>" . "null" . "</b></td>";
                              echo "<td style=\"text-align:center;\">" , "null" , "</td>";
                              echo '</tr>';
                          }
                      echo '</tbody>';
                    echo '</thread>';
                  echo '</table>';
                  echo '</div>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="uhc" class="three">
					<div class="container">

						<header>
							<h2>UHC Champions</h2>
						</header>

                        <article class="item">
                            <p>
                                <?php 
                                    echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('wins') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('wins_solo')) , '</strong>';
                                    echo '<br>';
                                    echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('kills')) , '</strong>';
                                    echo '<br>';
                                    echo 'Deaths: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('deaths')) , '</strong>';
                                    echo '<br>';
                                    echo 'Score: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('score')) , '</strong>';
                                    echo '<br>';
                                    echo '<br>';
                                    echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('coins')) , '</strong>';
                                ?>
                            </p>
                            <p>
                                <?php
                                     echo 'Packages: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('packages/')) , '</strong>';
                                ?>
                            </p>
                        </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="sc" class="four">
					<div class="container">

						<header>
							<h2>Skyclash</h2>
						</header>

                        <article class="item">
                          <p>
                            <?php 
                              echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('wins')) , '</strong>';
                              echo '<br>';
                              echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('kills')) , '</strong>';
                              echo '<br>';
                              echo 'Loses: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('losses')) , '</strong>';
                              echo '<br>';
                              $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('deaths');
                              echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                              echo '<br>';
                              echo '<br>';
                              echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYCLASH)->getInt('coins')) , '</strong>';
                            ?>
                          </p>
                        </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="qc" class="two">
					<div class="container">

						<header>
							<h2>Quakecraft</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  $totalWins = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('wins_teams') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('wins');
                  echo 'Wins: <strong>' , number_format($totalWins) , '</strong>';
                  echo '<br>';
                  $totalKills = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('kills_teams') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('kills');
                  echo 'Kills: <strong>' . number_format($totalKills) , '</strong>';
                  echo '<br>';
                  $totalDeaths = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('deaths') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('deaths_teams');
                  $kdr = $totalKills/$totalDeaths;
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  $totalKillstreaks = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('killstreaks') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('killstreaks_teams');
                  echo 'Killstreaks: <strong>' , number_format($totalKillstreaks) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="wa" class="three">
					<div class="container">

						<header>
							<h2>Walls</h2>
						</header>

            <article class="item">
              <p>
                <?php 
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  echo 'Loses: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('losses')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="ac" class="four">
					<div class="container">

						<header>
							<h2>Arcade</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  echo 'Mini Walls Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->getInt('wins_mini_walls')) , '</strong>';
                  echo '<br>';
                  echo 'Mini Walls Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->getInt('kills_mini_walls')) , '</strong>';
                  echo '<br>';
                  echo 'Bountry Hunter Kills: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->getInt('bounty_kills_oneinthequiver')) , '</strong>';
                  echo '<br>';
                  echo 'Football Goals: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->getInt('goals_soccer')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="tkr" class="two">
					<div class="container">

						<header>
							<h2>Turbo Kart Racers</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  echo 'Laps completed: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('laps_completed')) , '</strong>';
                  echo '<br>';
                  echo 'Gold Trophies: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('gold_trophy')) , '</strong>';
                  echo '<br>';
                  echo 'Silver Trophies: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('silver_trophy')) , '</strong>';
                  echo '<br>';
                  echo 'Bronze Trophies: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('bronze_trophy')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="vz" class="three">
					<div class="container">

						<header>
							<h2>Vampire Z</h2>
						</header>

            <article class="item">
              <p>
                
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="sh" class="four">
					<div class="container">

						<header>
							<h2>Smash Heroes</h2>
						</header>

            <article class="item">
              <p>
                <?php 
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  echo 'Loses: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('losses')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="tnt" class="two">
					<div class="container">

						<header>
							<h2>TNT Games</h2>
						</header>

            <article class="item">
              <p>
                
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="cvc" class="three">
					<div class="container">

						<header>
							<h2>Cops vs Crims</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  echo 'Round wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('round_wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo 'Bombs planted: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('bombs_planted')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="pb" class="four">
					<div class="container">

						<header>
							<h2>Paintball</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo 'Snowballs thrown: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('shots_fired')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="cw" class="two">
					<div class="container">

						<header>
							<h2>Crazy Walls</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('wins')) , '</strong>';
                  echo '<br>';
                  echo 'Kills: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('kills')) , '</strong>';
                  echo '<br>';
                  $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('deaths');
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo 'Skulls gathered: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('skulls_gathered')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->getInt('coins')) , '</strong>';
                        ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="suhc" class="three">
					<div class="container">

						<header>
							<h2>Speed UHC</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  $totalWins = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('wins_teams') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('wins');
                  echo 'Wins: <strong>' , number_format($totalWins) , '</strong>';
                  echo '<br>';
                  $totalKills = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('kills_teams') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('kills');
                  echo 'Kills: <strong>' . number_format($totalKills) , '</strong>';
                  echo '<br>';
                  $totalDeaths = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('deaths') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('deaths_teams');
                  $kdr = $totalKills/$totalDeaths;
                  echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Salt: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('salt')) , '</strong>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SPEED_UHC)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
        <!-- Specific Game Stats -->
				<section id="ab" class="four">
					<div class="container">

						<header>
							<h2>Arena Brawl</h2>
						</header>

            <article class="item">
              <p>
                <?php
                  $totalWins = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('wins_4v4') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('wins_2v2');
                  echo 'Wins: <strong>' , number_format($totalWins) , '</strong>';
                  echo '<br>';
                  $totalKills = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('kills_4v4') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('kills_2v2');
                  echo 'Kills: <strong>' , number_format($totalKills) , '</strong>';
                  echo '<br>';
                  echo 'Keys: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('keys')) , '</strong>';
                  echo '<br>';
                  echo 'Rating: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('rating')) , '</strong>';
                  echo '<br>';
                  echo '<br>';
                  echo '<br>';
                  echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARENA)->getInt('coins')) , '</strong>';
                ?>
              </p>
            </article>
            
					</div>
				</section>
        
    </div> 

	<!-- Footer -->
		<div id="footer">

			<!-- Copyright -->
				<ul class="copyright">
					<li>&copy; Notifly. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>

		</div>
   
   <?php
      }
    ?>

	<!-- Scripts -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/jquery.scrolly.min.js"></script>
		<script src="/assets/js/jquery.scrollzer.min.js"></script>
		<script src="/assets/js/skel.min.js"></script>
		<script src="/assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="/assets/js/main.js"></script>

</body>