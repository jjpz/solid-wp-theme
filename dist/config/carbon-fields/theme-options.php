<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Options
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    // General Options
    $theme_options = Container::make( 'theme_options', __( 'Theme Options' . crb_lang_name() ) )
        ->set_page_file( 'theme-options' )
		->set_page_menu_position( 4 )
        ->set_icon( 'dashicons-admin-generic' )
        ->add_fields( array(
            Field::make( 'separator', 'crb_theme_nav_separator', 'Navigation' ),
            Field::make( 'image', 'crb_theme_nav_logo', __( 'Navigation Bar Logo' ) )->set_classes( 'col-sm-6' ),
            Field::make( 'checkbox', 'crb_theme_remove_nav_site_title', __( 'Remove website title from navigation bar' ) )->set_classes( 'col-sm-6' ),
            Field::make( 'separator', 'crb_theme_contact_separator', 'Contact Information' ),
            Field::make( 'text', 'crb_theme_address_1', 'Address Line 1' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_address_2', 'Address Line 2' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_city', 'City' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_state', 'State' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_zipcode', 'Zip Code' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_phone', 'Phone' )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_email', 'Email' )->set_classes( 'col-6' ),
            Field::make( 'separator', 'crb_theme_social_separator', 'Social Media Links' ),
            Field::make( 'text', 'crb_theme_facebook_link', __( 'Facebook' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_instagram_link', __( 'Instagram' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_linkedin_link', __( 'LinkedIn' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_twitter_link', __( 'Twitter' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_youtube_link', __( 'YouTube' ) )->set_classes( 'col-6' )
        ) );

    // Home Cover Section
    Container::make( 'theme_options', __( 'Cover' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-cover-section' )
		->add_fields( array(
			Field::make( 'image', 'crb_home_cover_background_image_desktop', 'Desktop Background  Image' )->set_classes( 'col-6' ),
			Field::make( 'image', 'crb_home_cover_background_image_mobile', 'Mobile Background  Image' )->set_classes( 'col-6' ),
            Field::make( 'textarea', 'crb_home_cover_title' . crb_lang_slug(), 'Title' . crb_lang_name() )
                ->set_rows( 3 ),
            Field::make( 'textarea', 'crb_home_cover_subtitle' . crb_lang_slug(), 'Subtitle' . crb_lang_name() )
                ->set_rows( 3 ),
            Field::make( 'image', 'crb_home_cover_title_image_desktop', __( 'Desktop Title Image' ) )->set_classes( 'col-6' ),
            Field::make( 'image', 'crb_home_cover_title_image_mobile', __( 'Mobile Title Image' ) )->set_classes( 'col-6' ),
		) );

    // Home Intro Section
    Container::make( 'theme_options', __( 'Intro' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-intro-section' )
		->add_fields( array(
			Field::make( 'rich_text', 'crb_home_intro_paragraph' . crb_lang_slug(), 'Paragraph' . crb_lang_name() )->set_help_text( 'Left column paragraph text.' ),
            Field::make( 'textarea', 'crb_home_intro_bigtext' . crb_lang_slug(), 'Big Text' . crb_lang_name() )
                ->set_rows( 3 )
                ->set_help_text( 'Right column big text.' )
        ) );

    // Home Awards Section
    Container::make( 'theme_options', __( 'Awards' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-awards-section' )
		->add_fields( array(
            Field::make( 'text', 'crb_home_awards_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
            Field::make( 'rich_text', 'crb_home_awards_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Services Section
    Container::make( 'theme_options', __( 'Services' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-services-section' )
		->add_fields( array(
            Field::make( 'text', 'crb_home_services_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
            Field::make( 'rich_text', 'crb_home_services_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Team Section
    Container::make( 'theme_options', __( 'Team' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-team-section' )
		->add_fields( array(
			Field::make( 'text', 'crb_home_team_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
			Field::make( 'rich_text', 'crb_home_team_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Contact Section
    Container::make( 'theme_options', __( 'Contact Form' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-contact-section' )
		->add_fields( array(
            Field::make( 'textarea', 'crb_home_contact_bigtext' . crb_lang_slug(), 'Section Big Text' . crb_lang_name() )
                ->set_rows( 3 )->set_help_text( 'Left column big text.' ),
			Field::make( 'rich_text', 'crb_home_contact_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )->set_help_text( 'Right column paragraph text.' ),
			Field::make( 'text', 'crb_contactform_shortcode' . crb_lang_slug(), 'Contact Form Shortcode' . crb_lang_name() ),
		) );
}