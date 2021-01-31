<?php
$site_title = get_bloginfo('title');
$site_tagline = get_bloginfo('description');


// Awards
$home_awards_title = carbon_get_theme_option('crb_home_awards_title');
$home_awards_paragraph = apply_filters('the_content', carbon_get_theme_option('crb_home_awards_paragraph'));
${'home_awards_title' . crb_lang_slug()} = get_option('_crb_home_awards_title' . crb_lang_slug());
${'home_awards_paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_awards_paragraph' . crb_lang_slug()));
// Services
$home_services_title = carbon_get_theme_option('crb_home_services_title');
$home_services_paragraph = apply_filters('the_content', carbon_get_theme_option('crb_home_services_paragraph'));
${'home_services_title' . crb_lang_slug()} = get_option('_crb_home_services_title' . crb_lang_slug());
${'home_services_paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_services_paragraph' . crb_lang_slug()));
// Team
$home_team_title = carbon_get_theme_option('crb_home_team_title');
$home_team_paragraph = apply_filters('the_content', carbon_get_theme_option('crb_home_team_paragraph'));
${'home_team_title' . crb_lang_slug()} = get_option('_crb_home_team_title' . crb_lang_slug());
${'home_team_paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_team_paragraph' . crb_lang_slug()));
// Contact
$home_contact_form = carbon_get_theme_option('crb_contactform_shortcode');
$home_contact_bigtext = nl2br(carbon_get_theme_option('crb_home_contact_bigtext'));
$home_contact_paragraph = apply_filters('the_content', carbon_get_theme_option('crb_home_contact_paragraph'));
${'home_contact_form' . crb_lang_slug()} = get_option('_crb_contactform_shortcode' . crb_lang_slug());
${'home_contact_bigtext' . crb_lang_slug()} = nl2br(get_option('_crb_home_contact_bigtext' . crb_lang_slug()));
${'home_contact_paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_contact_paragraph' . crb_lang_slug()));
// Footer
$GLOBALS['g_footer_vars'] = [
'address_1' => carbon_get_theme_option('crb_theme_address_1'),
'address_2' => carbon_get_theme_option('crb_theme_address_2'),
'city' => carbon_get_theme_option('crb_theme_city'),
'state' => carbon_get_theme_option('crb_theme_state'),
'zipcode' => carbon_get_theme_option('crb_theme_zipcode'),
'phone' => carbon_get_theme_option('crb_theme_phone'),
'email' => carbon_get_theme_option('crb_theme_email'),
'facebook' => carbon_get_theme_option('crb_theme_facebook_link'),
'instagram' => carbon_get_theme_option('crb_theme_instagram_link'),
'linkedin' => carbon_get_theme_option('crb_theme_linkedin_link'),
'twitter' => carbon_get_theme_option('crb_theme_twitter_link'),
'youtube' => carbon_get_theme_option('crb_theme_youtube_link')
];
// test
$color = carbon_get_theme_option('crb_color');
echo $color;
?>