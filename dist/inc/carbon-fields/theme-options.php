<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Options
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    // General Options
    $theme_options = Container::make( 'theme_options', __( 'Theme Options' . crb_lang_name() ) )
        ->where('current_user_role', 'IN', array('administrator', 'editor'))
        ->set_page_file( 'theme-options' )
		->set_page_menu_position( 4 )
        ->set_icon( 'dashicons-admin-generic' )
        ->add_fields( array(
            Field::make( 'separator', 'crb_theme_nav_separator', 'Navigation' ),
            Field::make( 'image', 'crb_theme_nav_logo', __( 'Navigation Bar Logo' ) )->set_classes( 'col-sm-6' ),
            Field::make( 'checkbox', 'crb_theme_remove_nav_site_title', __( 'Remove website title from navigation bar' ) )->set_classes( 'col-sm-6' ),
            Field::make( 'separator', 'crb_theme_contact_separator', 'Address' . crb_lang_name() ),
            Field::make( 'text', 'crb_theme_address_1', 'Address Line 1' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_address_2', 'Address Line 2' )->set_classes( 'col-sm-6' ),
            Field::make( 'text', 'crb_theme_city', 'City' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_state', 'State' )->set_classes( 'col-4' ),
            Field::make( 'text', 'crb_theme_zipcode', 'Zip Code' )->set_classes( 'col-4' ),
            Field::make( 'separator', 'crb_theme_social_separator', 'Footer' . crb_lang_name() ),
            Field::make( 'text', 'crb_theme_phone', 'Phone' )->set_classes( 'col-6' ),
            Field::make( 'text', 'crb_theme_email', 'Email' )->set_classes( 'col-6' ),
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
            Field::make( 'text', 'crb_home_award_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
            Field::make( 'rich_text', 'crb_home_award_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Services Section
    Container::make( 'theme_options', __( 'Services' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-services-section' )
		->add_fields( array(
            Field::make( 'radio', 'crb_home_service_layout', __( 'Display Content' ) )
                ->add_options( array(
                    'full' => __( 'all together' ),
                    'single' => __( 'in separate pages' ),
                    'popup' => __( 'in popups' )
                ) ),
            Field::make( 'text', 'crb_home_service_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
            Field::make( 'rich_text', 'crb_home_service_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Team/Members Section
    Container::make( 'theme_options', __( 'Team' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-team-section' )
		->add_fields( array(
            Field::make( 'radio', 'crb_home_member_layout', __( 'Display Content' ) )
                ->add_options( array(
                    'full' => __( 'all together' ),
                    'single' => __( 'in separate pages' ),
                    'popup' => __( 'in popups' )
                ) ),
			Field::make( 'text', 'crb_home_member_title' . crb_lang_slug(), 'Section Title' . crb_lang_name() ),
			Field::make( 'rich_text', 'crb_home_member_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )
		) );

    // Home Contact Section
    Container::make( 'theme_options', __( 'Contact' . crb_lang_name() ) )
        ->set_page_parent( $theme_options )
        ->set_page_file( 'theme-options-contact-section' )
		->add_fields( array(
            Field::make( 'textarea', 'crb_home_contact_bigtext' . crb_lang_slug(), 'Section Big Text' . crb_lang_name() )
                ->set_rows( 3 )->set_help_text( 'Left column big text.' ),
			Field::make( 'rich_text', 'crb_home_contact_paragraph' . crb_lang_slug(), 'Section Paragraph' . crb_lang_name() )->set_help_text( 'Right column paragraph text.' ),

            Field::make( 'radio', 'crb_home_contact_type' . crb_lang_slug(), 'Contact Type' . crb_lang_name() )
                ->add_options( array(
                    'none' => 'none',
                    'contact_form' => 'contact form',
                    'direct_links' => 'direct links'
                ) ),

			Field::make( 'text', 'crb_contactform_shortcode' . crb_lang_slug(), 'Contact Form Shortcode' . crb_lang_name() )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'crb_home_contact_type' . crb_lang_slug(),
                        'value' => 'contact_form',
                        'compare' => '='
                    )
                ) ),

                Field::make( 'text', 'crb_home_contact_text_link' . crb_lang_slug(), 'text' . crb_lang_name() )
                ->set_attribute( 'placeholder', '(***) ***-****' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'crb_home_contact_type' . crb_lang_slug(),
                        'value' => 'direct_links',
                        'compare' => '='
                    )
                ) ),

                Field::make( 'text', 'crb_home_contact_voice_link' . crb_lang_slug(), 'voice' . crb_lang_name() )
                ->set_attribute( 'placeholder', '(***) ***-****' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'crb_home_contact_type' . crb_lang_slug(),
                        'value' => 'direct_links',
                        'compare' => '='
                    )
                ) ),

                Field::make( 'text', 'crb_home_contact_email_link' . crb_lang_slug(), 'email' . crb_lang_name() )
                ->set_attribute( 'placeholder', 'email@domain.com' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'crb_home_contact_type' . crb_lang_slug(),
                        'value' => 'direct_links',
                        'compare' => '='
                    )
                ) ),
		) );
}