add_filter( 'product_type_selector', 'bbloomer_add_custom_product_type' );
 
function bbloomer_add_custom_product_type( $types ){
    $types[ 'custom' ] = 'Custom product';
    return $types;
}
 
// --------------------------
// #2 Add New Product Type Class
 
add_action( 'init', 'bbloomer_create_custom_product_type' );
 
function bbloomer_create_custom_product_type(){
    class WC_Product_Custom extends WC_Product {
      public function get_type() {
         return 'custom';
      }
    }
}
 
// --------------------------
// #3 Load New Product Type Class
 
add_filter( 'woocommerce_product_class', 'bbloomer_woocommerce_product_class', 10, 2 );
 
function bbloomer_woocommerce_product_class( $classname, $product_type ) {
    if ( $product_type == 'custom' ) {
        $classname = 'WC_Product_Custom';
    }
    return $classname;
}
