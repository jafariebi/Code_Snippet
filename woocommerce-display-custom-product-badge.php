// -----------------------------------------------------------
// 1. Add new checkbox to product edit page (General tab)
  
add_action( 'woocommerce_product_options_general_product_data', 'bbloomer_add_badge_checkbox_to_products' );        
  
function bbloomer_add_badge_checkbox_to_products() {           
woocommerce_wp_checkbox( array( 
'id' => 'custom_badge', 
'class' => '', 
'label' => 'Show Custom Badge'
) 
);      
}
  
// -----------------------------------------------------------
// 2. Save checkbox via custom field
  
add_action( 'save_post', 'bbloomer_save_badge_checkbox_to_post_meta' );
  
function bbloomer_save_badge_checkbox_to_post_meta( $product_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if ( isset( $_POST['custom_badge'] ) ) {
            update_post_meta( $product_id, 'custom_badge', $_POST['custom_badge'] );
    } else delete_post_meta( $product_id, 'custom_badge' );
}


// -----------------------------------------------------------
// 3. Display badge @ single product page if checkbox checked
  
add_action( 'woocommerce_single_product_summary', 'bbloomer_display_badge_if_checkbox', 6 );
  
function bbloomer_display_badge_if_checkbox() {
    global $product;     
    if ( get_post_meta( $product->get_id(), 'custom_badge', true ) ) {
        echo '
<div class="woocommerce-message">CUSTOM BADGE!</div>
 
';
    }
}
