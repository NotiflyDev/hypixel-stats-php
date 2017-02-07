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
    if ($guild == null) {
      echo '<script type="text/javascript">alert("Invalid guild! Please try again");history.go(-1);</script>';
      } else {?>

<body>

	<!-- Header -->
		<div id="header">

			<div class="top">

				<!-- Logo -->
					<div id="logo">
						<a href="/">
              <span style="background-color: transparent;" class="image avatar48"><i class="icon fa-flag-o"></i></span>
              <h1 id="title"><?php echo $guild->getName(); ?></h1>
						  <p>
                <?php 
                  if ($guild->canTag()) {
                    echo '<strong style="color: #888; font-weight: 500">[' . $guild->getTag() . ']</strong>';
                  }
                ?>
              </p>
            </a>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#guild" id="gen-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Guild</span></a></li>
              <li><a href="#general" id="gen-link" class="skel-layers-ignoreHref"><span class="icon fa-cogs">General Stats</span></a></li>
              <li><a href="#members" id="gen-link" class="skel-layers-ignoreHref"><span class="icon fa-group">Members</span></a></li>  
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
				<section id="guild" class="four">
					<div class="container">

						<header>
              
              <span class="icon fa-flag fa-2x"><h2><?php echo $guild->getName(); ?> Guild</h2></span>
              
              <?php
              
                $memberList = $guild->getMemberList();
                  foreach ($memberList->getList() as $rank => $members) {
                  	foreach ($members as $member) {
                  		/** @var $member \HypixelPHP\GuildMember */
                  		$player = $member->getPlayer();
                     break;
                  	}
                    break;                   
                  }

              echo "<span><img src=\"https://crafatar.com/renders/head/" . $player->getName() . "?helm&scale=10\"></span>";

              ?>
              
              
              <p>Guild Master:</p>
              <?php
                  
              echo "<h3><a href=\"/stats/player/index.php?ign=" . $player->getName() . "\">" . $player->getFormattedName(true, false) . "</a></h3>";

              ?>
						</header>

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
                
                  $memberList = $guild->getMemberList();
                  foreach ($memberList->getList() as $rank => $members) {
                  	foreach ($members as $member) {
                  		$player = $member->getPlayer();
                      $memberCount = $memberCount + 1;
                  	}
                  }
                  
                
                  if ($guild != null) {
                    echo 'Name: <strong>' . $guild->getName() . '</strong>';
                    echo '<br>';
                    if ($guild->canTag()) {
                        echo 'Tag: <strong>[' . $guild->getTag() . ']</strong>';
                    } else {
                        echo "Tag: <i class=\"icon fa-times\"></i>";
                    }
                    
                    echo '<br>';
                    echo 'Coins: <strong>' . number_format($guild->getInt('coins')) . '</strong>';
                    
                    echo '<br>';
                    echo 'Members: <strong>' . $memberCount . '</strong>';
                    
                    echo '<br>';
                    if ($guild->getInt('canMotd') == 1) {
                      echo "Motd: <i class=\"icon fa-check\"></i>";
                    } else {
                      echo "Motd: <i class=\"icon fa-times\"></i>";
                    }
                    
                    echo '<br>';
                    if ($guild->getInt('canParty') == 1) {
                      echo "Party: <i class=\"icon fa-check\"></i>";
                    } else {
                      echo "Party: <i class=\"icon fa-times\"></i>";
                    }
                  } else {
                      echo 'Guild == null';
                      print_r($HypixelPHP->getUrlErrors());
                  }
                ?>
                                
                </p>
              </article>

						
					</div>
				</section>
        
        <!-- Members -->
				<section id="members" class="two">
					<div class="container">
						<header>
							<h2>Members</h2>
              <?php echo $memberCount . "/" . $guild->getInt('memberSizeLevel')*5 ;?>
            </header>
              <article class="item">
                <p>
                
                <?php
                  if ($guild != null) {
                    $HypixelPHP->setCacheTime(24 * 60 * 60, \HypixelPHP\CACHE_TIMES::PLAYER);
                
                    echo '<ul>';
                
                    // Don't want to load players here, big guilds would
                    // throttle your key. We're only getting the exact name
                    // from cache or new if player doesn't exist yet
                
                    $memberList = $guild->getMemberList();
                    foreach ($memberList->getList() as $rank => $members) {
                        echo "<br>";  
                        echo "<h1>$rank</h1>";
                        foreach ($members as $member) {
                            /** @var $member \HypixelPHP\GuildMember */
                            $player = $member->getPlayer();
                            if ($player == null) continue;
                
                            echo "<li><a href=\"/stats/player/index.php?ign=" . $player->getName() . "\">" . $player->getFormattedName(true, false) . "</a></li>";
                        }
                    }
                    
                    echo '</ul>';
                    
                    } else {
                        echo 'Guild == null';
                        print_r($HypixelPHP->getUrlErrors());
                    }
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