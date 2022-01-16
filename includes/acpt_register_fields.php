<?php

class Partners_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'partner_fields',
			__( 'Partner Fields', 'pcpt' ),
			array( $this, 'render_metabox' ),
			'partners',
			'normal',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$pcpt_name = get_post_meta( $post->ID, 'pcpt_name', true );
		$pcpt_website = get_post_meta( $post->ID, 'pcpt_website', true );
		$pcpt_twitch = get_post_meta( $post->ID, 'pcpt_twitch', true );
		$pcpt_facebook = get_post_meta( $post->ID, 'pcpt_facebook', true );
		$pcpt_pc_build = get_post_meta( $post->ID, 'pcpt_pc_build', true );

		// Set default values.
		if( empty( $pcpt_name ) ) $pcpt_name = '';
		if( empty( $pcpt_website ) ) $pcpt_website = '';
		if( empty( $pcpt_twitch ) ) $pcpt_twitch = '';
		if( empty( $pcpt_facebook ) ) $pcpt_facebook = '';
		if( empty( $pcpt_pc_build ) ) $pcpt_pc_build = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="pcpt_name" class="pcpt_name_label">' . __( 'Name', 'pcpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="pcpt_name" name="pcpt_name" class="pcpt_name_field" placeholder="' . esc_attr__( '', 'pcpt' ) . '" value="' . esc_attr( $pcpt_name ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="pcpt_website" class="pcpt_website_label">' . __( 'Website', 'pcpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="pcpt_website" name="pcpt_website" class="pcpt_website_field" placeholder="' . esc_attr__( '', 'pcpt' ) . '" value="' . esc_attr( $pcpt_website ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="pcpt_twitch" class="pcpt_twitch_label">' . __( 'Twitch', 'pcpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="pcpt_twitch" name="pcpt_twitch" class="pcpt_twitch_field" placeholder="' . esc_attr__( '', 'pcpt' ) . '" value="' . esc_attr( $pcpt_twitch ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="pcpt_facebook" class="pcpt_facebook_label">' . __( 'Facebook', 'pcpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="pcpt_facebook" name="pcpt_facebook" class="pcpt_facebook_field" placeholder="' . esc_attr__( '', 'pcpt' ) . '" value="' . esc_attr( $pcpt_facebook ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="pcpt_pc_build" class="pcpt_pc_build_label">' . __( 'PC Build', 'pcpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="pcpt_pc_build" name="pcpt_pc_build" class="pcpt_pc_build_field" placeholder="' . esc_attr__( '', 'pcpt' ) . '" value="' . esc_attr( $pcpt_pc_build ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$pcpt_new_name = isset( $_POST[ 'pcpt_name' ] ) ? sanitize_text_field( $_POST[ 'pcpt_name' ] ) : '';
		$pcpt_new_website = isset( $_POST[ 'pcpt_website' ] ) ? esc_url( $_POST[ 'pcpt_website' ] ) : '';
		$pcpt_new_twitch = isset( $_POST[ 'pcpt_twitch' ] ) ? esc_url( $_POST[ 'pcpt_twitch' ] ) : '';
		$pcpt_new_facebook = isset( $_POST[ 'pcpt_facebook' ] ) ? esc_url( $_POST[ 'pcpt_facebook' ] ) : '';
		$pcpt_new_pc_build = isset( $_POST[ 'pcpt_pc_build' ] ) ? esc_url( $_POST[ 'pcpt_pc_build' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'pcpt_name', $pcpt_new_name );
		update_post_meta( $post_id, 'pcpt_website', $pcpt_new_website );
		update_post_meta( $post_id, 'pcpt_twitch', $pcpt_new_twitch );
		update_post_meta( $post_id, 'pcpt_facebook', $pcpt_new_facebook );
		update_post_meta( $post_id, 'pcpt_pc_build', $pcpt_new_pc_build );

	}

}

new Partners_Meta_Box;

// Partner pcs


class Partner_Pc_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'partner_pc_fields',
			__( 'Partner Fields', 'ppccpt' ),
			array( $this, 'render_metabox' ),
			'partner_pc',
			'normal',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$ppccpt_name = get_post_meta( $post->ID, 'ppccpt_name', true );
		$ppccpt_website = get_post_meta( $post->ID, 'ppccpt_website', true );
		$ppccpt_twitch = get_post_meta( $post->ID, 'ppccpt_twitch', true );
		$ppccpt_facebook = get_post_meta( $post->ID, 'ppccpt_facebook', true );
		$ppccpt_pc_build = get_post_meta( $post->ID, 'ppccpt_pc_build', true );

		// Set default values.
		if( empty( $ppccpt_name ) ) $ppccpt_name = '';
		if( empty( $ppccpt_website ) ) $ppccpt_website = '';
		if( empty( $ppccpt_twitch ) ) $ppccpt_twitch = '';
		if( empty( $ppccpt_facebook ) ) $ppccpt_facebook = '';
		if( empty( $ppccpt_pc_build ) ) $ppccpt_pc_build = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="ppccpt_name" class="ppccpt_name_label">' . __( 'Name', 'ppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="ppccpt_name" name="ppccpt_name" class="ppccpt_name_field" placeholder="' . esc_attr__( '', 'ppccpt' ) . '" value="' . esc_attr( $ppccpt_name ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="ppccpt_website" class="ppccpt_website_label">' . __( 'Website', 'ppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="ppccpt_website" name="ppccpt_website" class="ppccpt_website_field" placeholder="' . esc_attr__( '', 'ppccpt' ) . '" value="' . esc_attr( $ppccpt_website ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="ppccpt_twitch" class="ppccpt_twitch_label">' . __( 'Twitch', 'ppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="ppccpt_twitch" name="ppccpt_twitch" class="ppccpt_twitch_field" placeholder="' . esc_attr__( '', 'ppccpt' ) . '" value="' . esc_attr( $ppccpt_twitch ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="ppccpt_facebook" class="ppccpt_facebook_label">' . __( 'Facebook', 'ppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="ppccpt_facebook" name="ppccpt_facebook" class="ppccpt_facebook_field" placeholder="' . esc_attr__( '', 'ppccpt' ) . '" value="' . esc_attr( $ppccpt_facebook ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="ppccpt_pc_build" class="ppccpt_pc_build_label">' . __( 'PC Build', 'ppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="ppccpt_pc_build" name="ppccpt_pc_build" class="ppccpt_pc_build_field" placeholder="' . esc_attr__( '', 'ppccpt' ) . '" value="' . esc_attr( $ppccpt_pc_build ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$ppccpt_new_name = isset( $_POST[ 'ppccpt_name' ] ) ? sanitize_text_field( $_POST[ 'ppccpt_name' ] ) : '';
		$ppccpt_new_website = isset( $_POST[ 'ppccpt_website' ] ) ? esc_url( $_POST[ 'ppccpt_website' ] ) : '';
		$ppccpt_new_twitch = isset( $_POST[ 'ppccpt_twitch' ] ) ? esc_url( $_POST[ 'ppccpt_twitch' ] ) : '';
		$ppccpt_new_facebook = isset( $_POST[ 'ppccpt_facebook' ] ) ? esc_url( $_POST[ 'ppccpt_facebook' ] ) : '';
		$ppccpt_new_pc_build = isset( $_POST[ 'ppccpt_pc_build' ] ) ? esc_url( $_POST[ 'ppccpt_pc_build' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'ppccpt_name', $ppccpt_new_name );
		update_post_meta( $post_id, 'ppccpt_website', $ppccpt_new_website );
		update_post_meta( $post_id, 'ppccpt_twitch', $ppccpt_new_twitch );
		update_post_meta( $post_id, 'ppccpt_facebook', $ppccpt_new_facebook );
		update_post_meta( $post_id, 'ppccpt_pc_build', $ppccpt_new_pc_build );

	}

}

new Partner_Pc_Meta_Box;


// Featured partner pcs

 class Featured_Partners_Pc_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes',        array( $this, 'add_metabox' )         );
		add_action( 'save_post',             array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'featured_partner_pc_fields',
			__( 'Partner Fields', 'fppccpt' ),
			array( $this, 'render_metabox' ),
			'featured_partner_pcs',
			'normal',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Retrieve an existing value from the database.
		$fppccpt_name = get_post_meta( $post->ID, 'fppccpt_name', true );
		$fppccpt_website = get_post_meta( $post->ID, 'fppccpt_website', true );
		$fppccpt_twitch = get_post_meta( $post->ID, 'fppccpt_twitch', true );
		$fppccpt_facebook = get_post_meta( $post->ID, 'fppccpt_facebook', true );
		$fppccpt_pc_build = get_post_meta( $post->ID, 'fppccpt_pc_build', true );

		// Set default values.
		if( empty( $fppccpt_name ) ) $fppccpt_name = '';
		if( empty( $fppccpt_website ) ) $fppccpt_website = '';
		if( empty( $fppccpt_twitch ) ) $fppccpt_twitch = '';
		if( empty( $fppccpt_facebook ) ) $fppccpt_facebook = '';
		if( empty( $fppccpt_pc_build ) ) $fppccpt_pc_build = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="fppccpt_name" class="fppccpt_name_label">' . __( 'Name', 'fppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="fppccpt_name" name="fppccpt_name" class="fppccpt_name_field" placeholder="' . esc_attr__( '', 'fppccpt' ) . '" value="' . esc_attr( $fppccpt_name ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="fppccpt_website" class="fppccpt_website_label">' . __( 'Website', 'fppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="fppccpt_website" name="fppccpt_website" class="fppccpt_website_field" placeholder="' . esc_attr__( '', 'fppccpt' ) . '" value="' . esc_attr( $fppccpt_website ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="fppccpt_twitch" class="fppccpt_twitch_label">' . __( 'Twitch', 'fppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="fppccpt_twitch" name="fppccpt_twitch" class="fppccpt_twitch_field" placeholder="' . esc_attr__( '', 'fppccpt' ) . '" value="' . esc_attr( $fppccpt_twitch ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="fppccpt_facebook" class="fppccpt_facebook_label">' . __( 'Facebook', 'fppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="fppccpt_facebook" name="fppccpt_facebook" class="fppccpt_facebook_field" placeholder="' . esc_attr__( '', 'fppccpt' ) . '" value="' . esc_attr( $fppccpt_facebook ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '	<tr>';
		echo '		<th><label for="fppccpt_pc_build" class="fppccpt_pc_build_label">' . __( 'PC Build', 'fppccpt' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="url" id="fppccpt_pc_build" name="fppccpt_pc_build" class="fppccpt_pc_build_field" placeholder="' . esc_attr__( '', 'fppccpt' ) . '" value="' . esc_attr( $fppccpt_pc_build ) . '">';
		echo '		</td>';
		echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Sanitize user input.
		$fppccpt_new_name = isset( $_POST[ 'fppccpt_name' ] ) ? sanitize_text_field( $_POST[ 'fppccpt_name' ] ) : '';
		$fppccpt_new_website = isset( $_POST[ 'fppccpt_website' ] ) ? esc_url( $_POST[ 'fppccpt_website' ] ) : '';
		$fppccpt_new_twitch = isset( $_POST[ 'fppccpt_twitch' ] ) ? esc_url( $_POST[ 'fppccpt_twitch' ] ) : '';
		$fppccpt_new_facebook = isset( $_POST[ 'fppccpt_facebook' ] ) ? esc_url( $_POST[ 'fppccpt_facebook' ] ) : '';
		$fppccpt_new_pc_build = isset( $_POST[ 'fppccpt_pc_build' ] ) ? esc_url( $_POST[ 'fppccpt_pc_build' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'fppccpt_name', $fppccpt_new_name );
		update_post_meta( $post_id, 'fppccpt_website', $fppccpt_new_website );
		update_post_meta( $post_id, 'fppccpt_twitch', $fppccpt_new_twitch );
		update_post_meta( $post_id, 'fppccpt_facebook', $fppccpt_new_facebook );
		update_post_meta( $post_id, 'fppccpt_pc_build', $fppccpt_new_pc_build );

	}

}

new Featured_Partners_Pc_Meta_Box;