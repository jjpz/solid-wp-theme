<?php
get_header();

require_once 'templates/front-page/home-hero.php';
require_once 'templates/front-page/home-intro.php';

getHomeSection( 'award', 'awards' );

getHomeSection( 'service', 'services' );

getHomeSection( 'member', 'team', array('home-section-w-bg') );

require_once 'templates/front-page/home-contact.php';

get_footer();
?>