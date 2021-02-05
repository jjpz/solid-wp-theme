<?php
get_header();

require_once 'includes/vars.php';

require_once 'templates/front-page/home-hero.php';
require_once 'templates/front-page/home-intro.php';

getHomeSection('_crb_home_awards_title', '_crb_home_awards_paragraph', 'awards', array(), 'award', $query);

getHomeSection('_crb_home_services_title', '_crb_home_services_paragraph', 'services', array(), 'service', $query);

getHomeSection('_crb_home_team_title', '_crb_home_team_paragraph', 'team', array('home-section-w-bg'), 'member', $query);

require_once 'templates/front-page/home-contact.php';

get_footer();
?>