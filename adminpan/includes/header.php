<?php
	staffCheckHk();
?>
<body>

  <div class='member'>
  <header class='member-header'>
    <div class='member-header__container mdl-layout--fixed-header mdl-layout--fixed-tabs'>
      <div class='member-header__head'>
        <div class='member-header__head__back-btn'>
        </div>
        <h2 class='member-header__head__title'><?= $lang["HkHouse"];?></h2>

      </div>
      <div class='member-header__nav mdl-tabs mdl-js-tabs mdl-js-ripple-effect'>
        <div class='mdl-tabs__tab-bar'>
          <a class='mdl-tabs__tab mdl-layout__tab is-active' href='<?php echo $config['hotelUrl'].'/adminpan/dash'; ?>'><?= $lang["Hksec1"]; ?></a>
          <a class='mdl-tabs__tab mdl-layout__tab is-active' href='<?php echo $config['hotelUrl'].'/adminpan/news'; ?>'><?= $lang["Hksec2"]; ?></a>
        </div>
      </div>
    </div>
  </header>
  <main class='member-content'>
    <section class='member-list'>
					<?php
					
					if ($menu == "hotel")
					{
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/news">
							  <div class="member-list__item active">
								<span class="member-list__item__name">'.$lang["HkNavNoticias"].'</span>
							  </div></a>
							  ';
						}
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/report">
							  <div class="member-list__item">
								<span class="member-list__item__name">'.$lang["HkNavReport"].'</span>
							  </div></a>
							  ';
						}
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/userofteweek">
							  <div class="member-list__item">
								<span class="member-list__item__name">'.$lang["HkNavSemana"].'</span>
							  </div></a>
							  ';
						}	
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/bans">
							  <div class="member-list__item">
								<span class="member-list__item__name">'.$lang["HkNavEditBan"].'</span>
							  </div></a>
							  ';
						}
						if (User::userData('rank') > $config['RankMax'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/badges">
							  <div class="member-list__item">
								<span class="member-list__item__name">'.$lang["HkNavBadges"].'</span>
							  </div></a>
							  ';
						}
					}
					else
					{
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'
							<a href="'.$config['hotelUrl'].'/adminpan/dash">
							  <div class="member-list__item active">
								<span class="member-list__item__name">'.$lang["HkNavInicio"].'</span>
							  </div></a>
							  ';
						}
						if (User::userData('rank') > $config['RankMax'] )
						{
							echo'	
							<a href="'.$config['hotelUrl'].'/adminpan/zoekgebruiker">
							  <div class="member-list__item ">
								<span class="member-list__item__name">'.$lang["HkNavEditUser"].'</span>
							  </div></a>
							';
						}					
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'	
							<a href="'.$config['hotelUrl'].'/adminpan/cloner">
							  <div class="member-list__item ">
								<span class="member-list__item__name">'.$lang["HkClon"].'</span>
							  </div></a>
							';
						}
						if (User::userData('rank') >= $config['RankMax'])
						{
							echo'	
							<a href="'.$config['hotelUrl'].'/adminpan/zoekgerank">
							  <div class="member-list__item ">
								<span class="member-list__item__name">'.$lang["HkNavEditRank"].'</span>
							  </div></a>
							';
						}
						if (User::userData('rank') > $config['RankMin'] )
						{
							echo'	
							<a href="'.$config['hotelUrl'].'/adminpan/ranklist">
							  <div class="member-list__item ">
								<span class="member-list__item__name">'.$lang["HkNavRankList"].'</span>
							  </div></a>
							';
						}
					}
					?>
    </section>