
<footer>
    <div class="container">
        <div class="hidden-md-down col-md-3 social-media">
            <span><?php echo $lang["Iredes"];?></span>
            <ul class="social-links">
                <li>
                    <a href="https://www.facebook.com/Comunidad-Hadrus-100815724811423"><img src="<?php echo H. $config['skin']; ?>/assets/images/fb.png" alt="Facebook"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/comunidad.hadrus/?hl=es-la"><img src="<?php echo H. $config['skin']; ?>/assets/images/instagram.png" alt="Instagram"></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo H. $config['skin']; ?>/assets/images/youtube.png" alt="Youtube"></a>
                </li>
                <li>
                    <a href="#"><img src="<?php echo H. $config['skin']; ?>/assets/images/rss.png" alt="RSS Feed"></a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 policies">
            <ul class="hidden-ms-down policy-links">
                <li>
                    <a href="/"><?= $config['hotelName'] ?></a>
                </li>
                <li>
                    <a href="#"><?php echo $lang["Ilinks1"]; ?></a>
                </li>
                <li>
                    <a href="#"><?php echo $lang["Ilinks2"]; ?></a>
                </li>
                <li>
                    <a href="#"><?php echo $lang["Ilinks3"]; ?></a>
                </li>
            </ul>

            <p class="copyright"><?php echo $lang["ICopyright1"]; ?>

            </p>
        </div>
    </div>
</footer>
<script src="<?php echo H. $config['skin']; ?>/assets/js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src"<?php echo H. $config['skin']; ?>/assets/js/jquery.min.js"><\/script>')</script>
    <link href="<?php echo H. $config['skin']; ?>/assets/css/fonts.css" rel="stylesheet">

<script src="<?php echo H. $config['skin']; ?>/assets/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $( '[data-slopt-forgot-password]' ).on( 'click', function()
        {
            $( '#myModal' ).modal( 'show' );

            return false;
        });

    </script>
    <script type="text/javascript">

        $( '[data-slopt-register]' ).on( 'click', function()
        {
            $( '#myModal' ).modal( 'show' );

            return false;
        });

    </script>