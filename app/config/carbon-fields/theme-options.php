<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Options
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {

    // General Options
	$theme_options = Container::make( 'theme_options', __( 'Theme Options' ) )
		->set_page_menu_position( 4 )
        ->set_icon( 'dashicons-admin-generic' )
        //->set_page_menu_title( 'Custom Options' )
        ->add_fields( array(
            //Field::make( 'color', 'crb_color', 'Background' )
                //->set_palette( array( '#FFFFFF', '#497096', '#184673' ) ),
            Field::make( 'separator', 'crb_contact_separator', 'Contact Information' ),
            Field::make( 'text', 'crb_theme_address_1', 'Address Line 1' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_address_2', 'Address Line 2' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_city', 'City' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_state', 'State' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_zipcode', 'Zip Code' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_phone', 'Phone' )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_email', 'Email' )->set_classes( 'col-6' ),
            Field::make( 'separator', 'crb_social_separator', 'Social Media Links' ),
            Field::make( 'text', 'crb_theme_facebook_link', __( 'Facebook' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_instagram_link', __( 'Instagram' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_linkedin_link', __( 'LinkedIn' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_twitter_link', __( 'Twitter' ) )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_youtube_link', __( 'YouTube' ) )->set_classes( 'col-6' )
        ) );

    // Home Intro Section
    Container::make( 'theme_options', __( 'Intro' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			Field::make( 'separator', 'crb_intro_separator', 'Banner' ),
			Field::make( 'image', 'crb_home_banner_desktop', 'Desktop Banner Image' )->set_classes( 'col-6' ),
			Field::make( 'image', 'crb_home_banner_mobile', 'Mobile Banner Image' )->set_classes( 'col-6' ),
            Field::make( 'textarea', 'crb_home_intro_title', 'Banner Title' )
                ->set_rows( 3 ),
            Field::make( 'textarea', 'crb_home_intro_subtitle', 'Banner Subtitle' )
                ->set_rows( 3 )
		) );

    // Home About Section
    Container::make( 'theme_options', __( 'About' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			//Field::make( 'separator', 'crb_about_separator', 'About' ),
			Field::make( 'rich_text', 'crb_home_about_paragraph', 'Section Paragraph' )->set_help_text( 'Left column paragraph text.' ),
            Field::make( 'textarea', 'crb_home_about_bigtext', 'Section Big Text' )
                ->set_rows( 3 )
                ->set_help_text( 'Right column big text.' )
        ) );

    // Home Awards Section
    Container::make( 'theme_options', __( 'Awards' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			//Field::make( 'separator', 'crb_awards_separator', 'Awards' ),
            Field::make( 'text', 'crb_home_awards_title', 'Section Title' ),
            Field::make( 'rich_text', 'crb_home_awards_paragraph', 'Section Paragraph' )
		) );

    // Home Services Section
    Container::make( 'theme_options', __( 'Services' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			//Field::make( 'separator', 'crb_services_separator', 'Services' ),
            Field::make( 'text', 'crb_home_services_title', 'Section Title' ),
            Field::make( 'rich_text', 'crb_home_services_paragraph', 'Section Paragraph' )
		) );

    // Home Team Section
    Container::make( 'theme_options', __( 'Team' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			//Field::make( 'separator', 'crb_team_separator', 'Team' ),
			Field::make( 'text', 'crb_home_team_title', 'Section Title' ),
			Field::make( 'rich_text', 'crb_home_team_paragraph', 'Section Paragraph' )
		) );

    // Home Contact Section
    Container::make( 'theme_options', __( 'Contact Form' ) )
        ->set_page_parent( $theme_options )
		->add_fields( array(
			//Field::make( 'separator', 'crb_contact_separator', 'Contact' ),
            Field::make( 'textarea', 'crb_home_contact_bigtext', 'Section Big Text' )
                ->set_rows( 3 )->set_help_text( 'Left column big text.' ),
			Field::make( 'rich_text', 'crb_home_contact_paragraph', 'Section Paragraph' )->set_help_text( 'Right column paragraph text.' ),
			Field::make( 'text', 'crb_contactform_shortcode', 'Contact Form Shortcode' ),
		) );
}