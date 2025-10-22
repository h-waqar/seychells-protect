<?php


function insert_repeater_row_attachment_sy( $files, $post_id, $mainrepeater, $repeaterfield, $documentNumber = null ) {

	$response = [];
	require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
	require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
	require_once( ABSPATH . "wp-admin" . '/includes/media.php' );

	foreach ( $files as $file ) {

		if ( $file['name'] ) {
			$myFile           = array(
				'name'     => $file['name'],
				'type'     => $file['type'],
				'tmp_name' => $file['tmp_name'],
				'error'    => $file['error'],
				'size'     => $file['size']
			);
			$upload_overrides = array( 'test_form' => false );
			$upload           = wp_handle_upload( $myFile, $upload_overrides );
			$filename         = $upload['file'];

			$response['filename']      = basename( $filename );
			$parent_post_id            = $post_id;
			$filetype                  = wp_check_filetype( basename( $filename ), null );
			$wp_upload_dir             = wp_upload_dir();
			$attachment                = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);
			$attach_id                 = wp_insert_attachment( $attachment, $filename, $parent_post_id );
			$response['attachment_id'] = $attach_id;
			$attach_data               = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}


		// Repeater child field name - "file"
		$file_row = array(
			"person_document" => $documentNumber,
			$repeaterfield    => $attach_id
		);

		// Repeater parent field name - "attachments"
		$response['status'] = add_row( $mainrepeater, $file_row, $post_id );


	}

	return $response;
}


function cs_insert_selfie_sy( $files, $post_id ) {


	require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
	require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
	require_once( ABSPATH . "wp-admin" . '/includes/media.php' );


	foreach ( $files as $file ) {

		if ( $file['name'] ) {
			$myFile           = array(
				'name'     => $file['name'],
				'type'     => $file['type'],
				'tmp_name' => $file['tmp_name'],
				'error'    => $file['error'],
				'size'     => $file['size']
			);
			$upload_overrides = array( 'test_form' => false );
			$upload           = wp_handle_upload( $myFile, $upload_overrides );
			$filename         = $upload['file'];


			$parent_post_id = $post_id;
			$filetype       = wp_check_filetype( basename( $filename ), null );
			$wp_upload_dir  = wp_upload_dir();
			$attachment     = array(
				'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit'
			);
			$attach_id      = wp_insert_attachment( $attachment, $filename, $parent_post_id );

			$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}
	} // foreach ends

	return $attach_id;
}


function generate_unique_key_and_store_sy( $post_id ) {
	$current_time = current_time( 'timestamp', 1 ); // Get the current timestamp with milliseconds.
	$unique_key   = 'cs_' . $post_id . '_' . $current_time;

	// Store the unique key in the options table with post_id as the option name.
	update_option( $post_id, $unique_key );

	return $unique_key;
}


function get_post_id_from_unique_key_sy( $unique_key ) {
	// Retrieve the post_id from the options table using the unique key as the option name.
	$post_id = get_option( $unique_key );

	return $post_id;
}
