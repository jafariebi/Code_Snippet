// If user role Vpn Customers
    add_role('vipcust', __('VIP'),
       array(
           'read'            => true, // Allows a user to read
           'create_posts'      => false, // Allows user to create new posts
           'edit_posts'        => false, // Allows user to edit their own posts
           'edit_others_posts' => false, // Allows user to edit others posts too
           'publish_posts' => false, // Allows the user to publish posts
           'manage_categories' => false, // Allows user to manage post categories
           )
    );


    add_filter( 'woocommerce_customer_get_downloadable_products', 'bbloomer_add_custom_default_download', 9999, 1 );

    function bbloomer_add_custom_default_download( $downloads ) {
        $user = wp_get_current_user();
        if ( in_array( 'vpncust', (array) $user->roles ) ) {
            //The user has the "vpncust" role

               $downloads[0] = array(
                  'product_name' => 'توضیحات لینک هدیه 1',
                  'download_name' => 'Button Label1',
                  'download_url' => 'file link1',
               );
               $downloads[1] = array(
                  'product_name' => 'توضیحات لینک هدیه 2',
                  'download_name' => 'Button Label2',
                  'download_url' => 'file link2',
               );
            return $downloads;
        }
    }
