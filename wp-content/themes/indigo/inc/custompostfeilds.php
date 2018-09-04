<?php

//--------Custom Post Type Feilds---------------------------------------


function member_add_meta_box() {
//this will add the metabox for the member post type
$screens = array( 'custom_posts' );

foreach ( $screens as $screen ) {

    add_meta_box(
        'member_sectionid',
        __( 'Price Details', 'member_textdomain' ),
        'member_meta_box_callback',
        $screen
    );
 }
}
add_action( 'add_meta_boxes', 'member_add_meta_box' );











function member_meta_box_callback( $post ) {

// Add a nonce field so we can check for it later.
wp_nonce_field( 'member_save_meta_box_data', 'member_meta_box_nonce' );
wp_nonce_field( 'member_save_meta_box_data2', 'member_meta_box_nonce2' );

/*
 * Use get_post_meta() to retrieve an existing value
 * from the database and use the value for the form.
 */
$value = get_post_meta( $post->ID, '_my_meta_value_key', true );
$value2 = get_post_meta( $post->ID, '_my_meta_value_key2', true );

echo '<label for="member_new_field">';
_e( 'Price', 'member_textdomain' );
echo '</label> ';
echo '<input type="text" id="member_new_field" name="member_new_field" value="' . esc_attr( $value ) . '" size="25" />';


echo '<label for="member_new_field2">';
_e( 'Phone Number', 'member_textdomain2' );
echo '</label> ';
echo '<input type="text" id="member_new_field2" name="member_new_field2" value="' . esc_attr( $value2 ) . '" size="25" />';


}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
 function member_save_meta_box_data( $post_id ) {

 if ( ! isset( $_POST['member_meta_box_nonce'] ) ) {
    return;
 }

 if ( ! wp_verify_nonce( $_POST['member_meta_box_nonce'], 'member_save_meta_box_data' ) ) {
    return;
 }

 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
 }

 // Check the user's permissions.
 if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

 } else {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
 }

 if ( ! isset( $_POST['member_new_field'] ) ) {
    return;
 }
 
  if ( ! isset( $_POST['member_new_field2'] ) ) {
    return;
 }

 $my_data = sanitize_text_field( $_POST['member_new_field'] );
 $my_data2 = sanitize_text_field( $_POST['member_new_field2'] );

 update_post_meta( $post_id, '_my_meta_value_key', $my_data );
 update_post_meta( $post_id, '_my_meta_value_key2', $my_data2 );
}
add_action( 'save_post', 'member_save_meta_box_data' );









?>