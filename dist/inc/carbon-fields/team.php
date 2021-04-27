<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_team_meta' );
function crb_attach_team_meta() {
	Container::make( 'post_meta', __( 'Team Member Title/Position', 'crb' ) )
		->where('current_user_role', 'IN', array('administrator', 'editor'))
		->where( 'post_type', '=', 'member' )
		->add_fields( array(
			Field::make( 'text', 'crb_team_title', '' )
		) );
}