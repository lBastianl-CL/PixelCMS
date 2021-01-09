<header>

    <div class="container">

        <a class="brand"></a>
		
        <div class="count"><?= $lang["Oonline"] ?>  <b><?= Game::usersOnline() ?></b> <?= $lang["Oonline2"] ?></div>

    </div>

    <nav class="main-navigation">

        <div class="container">

            <div class="col-md-12 no-padding">
                <ul class="nav">
                    <li class="active"><img src="<?php echo H. $config['skin']; ?>/assets/images/home.png" /><a href="<?= $config['hotelUrl']; ?>/me"><?= User::userData('username') ?></a></li>
                    <li><a href="<?= $config['hotelUrl']; ?>/community"><img src="<?php echo H. $config['skin']; ?>/assets/images/community.png" /><?= $lang["Ncommunity"] ?></a></li>
                    <li><a href="<?= $config['hotelUrl']; ?>/shop"><img src="<?php echo H. $config['skin']; ?>/assets/images/shop.png" /><?= $lang["Ntienda"] ?></a></li>
                    <li><a href="<?= $config['hotelUrl']; ?>/ayuda"><img src="<?php echo H. $config['skin']; ?>/assets/images/staff.png" /><?= $lang["Nayuda"] ?></a></li>
					<?php
						if (User::userData('rank') > $config['RankMin'] )
						{
							?>
                    <li><a href="<?= $config['hotelUrl']; ?>/adminpan/dash"><img src="<?php echo H. $config['skin']; ?>/assets/images/forums.png" />HK</a></li>
					<?php	}
						else
						{
							echo '';
						}
					?>
                    <li class="enter-hotel"><a href="<?= $config['hotelUrl']; ?>/client" style=" text-transform: inherit; "><img src="<?php echo H. $config['skin']; ?>/assets/images/enter-hotel.png" /></a></li>
                </ul>
            </div>

        </div>

    </nav>

</header>