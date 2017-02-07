<head>
  <style>@import url(https://fonts.googleapis.com/css?family=Neuton:700);h1.err{font-size:120px;margin:0;}.main{text-align:center;width:1200px;top:25%;left:50%;}.tc{font-weight:bold;}.guild-banner{height:100px;width:50px;-webkit-border-radius:4px;border-radius:4px;-webkit-box-shadow:0px 0px 14px 2px rgba(0,0,0,0.39);box-shadow:0px 0px 14px 2px rgba(0,0,0,0.39);margin-right:10px;background-color:#D4D4D4;margin-bottom:20px;}.bold{font-weight:bold;}.panel{margin-top:23px;}.jumbotron>h1{text-shadow:2px 2px 10px #000;font-size:6em;font-family:'Neuton',"Droid Sans",Tahoma,Arial,Verdana,sans-serif;font-weight:700;margin:0;color:#ffce4e;}.jumbotron{background:url('/img/outro8.png') no-repeat center center;background-size:cover;}.banner-div{position:absolute;}
  </style>
  <link rel="icon" href="/assets/favicon.ico">
  <<link rel="stylesheet" href="/assets/css/main-stats.css" />
  <title>Notiflys Hypixel Stats </title>
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
  if ($player != null) {?>


      <!-- Section -->
								<section>
                  <header id="header">
									<a href="/" class="logo"><h2>Hypixel Stats for <?php echo $player->getFormattedName(true, true); ?> </h2></a>
                      
									<ul class="icons">
                    <?php
                        $profile = ProfileUtils::getProfile($ign);
                          if ($profile != null) {
                            $result = $profile->getProfileAsArray();
                            $uuidPlayer = $result['uuid'];
                      ?>
                        <span class="image2"><img src="https://crafatar.com/avatars/<?php echo $uuidPlayer; ?>" alt=""></span>
                        
                      <?php
                        }
                      ?>
										<li><a href="https://twitter.com/Notifly_" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="https://www.youtube.com/channel/UC3y2pYjjQ1OqSqvRmqSaA7w" target="_blank" class="icon fa-youtube-play"><span class="label">YouTube</span></a></li>
										<li><a href="https://github.com/NotiflyAPI" target="_blank" class="icon fa-github"><span class="label">GitHub</span></a></li>
										<li><a href="http://steamcommunity.com/id/notifly" target="_blank" class="icon fa-steam"><span class="label">Steam</span></a></li>
										<li><a href="https://hypixel.net/members/notifly.398521/" target="_blank" class="icon fa-envelope"><span class="label">Hypixel Forums</span></a></li>
									</ul>
								</header>
                <?php
                  
                ?>
									<div class="posts">
										<article>
											<a href="#" class="image"><img src="http://i.imgur.com/XWRrhdn.png" alt="" /></a>
											<h3>Skywars</h3>
											<p>
                        <?php
                          echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('wins')) , '</strong>';
                          echo '<br>';
                          echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills')) , '</strong>';
                          echo '<br>';
                          echo 'Loses: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('losses')) , '</strong>';
                          echo '<br>';
                          $kdr = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('kills')/$player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('deaths');
                          echo 'KDR: <strong>' , round($kdr, 2) , '</strong>';
                          echo '<br>';
                          echo '<br>';
                          echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->getInt('coins')) , '</strong>';
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="http://i.imgur.com/06sa0qs.jpg" alt="" /></a>
											<h3>Mega Walls</h3>
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
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/8p_tosGn1vg/maxresdefault.jpg" alt="" /></a>
											  <h3>Warlords</h3>
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
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="http://i.imgur.com/LO0E5Xm.jpg" alt="" /></a>
                      <h3>Blitz Survival Games</h3>
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
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/DTZbv89iIb0/maxresdefault.jpg" alt="" /></a>
											<h3>SkyClash</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
										<article>
											<a href="#" class="image"><img src="http://i.imgur.com/hg8E0BU.jpg" alt="" /></a>
											<h3>UHC Champions</h3>
											<p>
                        <?php 
                          echo 'Wins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('wins') + $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('wins_solo')) , '</strong>';
                          echo '<br>';
                          echo 'Kills: <strong>' . number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('kills')) , '</strong>';
                          echo '<br>';
                          echo 'Deaths: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('deaths')) , '</strong>';
                          echo '<br>';;
                          echo 'Score: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('score')) , '</strong>';
                          echo '<br>';
                          echo '<br>';
                          echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->getInt('coins')) , '</strong>';
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/ckau1kOLLCc/maxresdefault.jpg" alt="" /></a>
											<h3>Arcade</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/v6iG_CJFYEg/maxresdefault.jpg" alt="" /></a>
											<h3>Cops & Crims</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/mveycjPemiQ/maxresdefault.jpg" alt="" /></a>
											<h3>Walls</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/u0OCbCxqMoY/maxresdefault.jpg" alt="" /></a>
											<h3>Smash Heros</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/qxuPgIbD4qU/maxresdefault.jpg" alt="" /></a>
											<h3>Quakecraft</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/a7JvLZprk4s/maxresdefault.jpg" alt="" /></a>
											<h3>Speed UHC</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/MQNcmj96Beg/maxresdefault.jpg" alt="" /></a>
											<h3>Turbo Kart Racers</h3>
											<p>
                        <?php
                          echo 'Laps completed: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('laps_completed')) , '</strong>';
                          echo '<br>';
                          echo '<br>';
                          echo '<br>';
                          echo '<br>';
                          echo '<br>';
                          echo 'Coins: <strong>' , number_format($player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->getInt('coins')) , '</strong>';
                        ?>
                      </p>
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/O4L-IviNFAY/maxresdefault.jpg" alt="" /></a>
											<h3>Crazy Walls</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/aj7no6ViMsM/maxresdefault.jpg" alt="" /></a>
											<h3>Paintball</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
                    <article>
											<a href="#" class="image"><img src="https://i.ytimg.com/vi/aj7no6ViMsM/maxresdefault.jpg" alt="" /></a>
											<h3>Arena Brawl</h3>
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
											<ul class="actions">
												<li><a href="#" class="button">More</a></li>
											</ul>
										</article>
									</div>
								</section>

    <?php
} else {
    echo 'Player == null';
    print_r($HypixelPHP->getUrlErrors());
}

?>

<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/main-player.css" />
    </head>
</html>