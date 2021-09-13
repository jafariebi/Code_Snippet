//if Parsidate plugin is active - change date only for fa_IR Lang
if ( is_plugin_active( 'wp-parsidate/wp-parsidate.php' ) ) {
	$lang = get_bloginfo("language");
	if ($lang != 'fa-IR') {
		global $wpp_settings;
		    remove_filter('the_time', 'wpp_fix_post_time', 10, 2);
		    remove_filter('the_date', 'wpp_fix_post_date', 10, 2);
		    remove_filter('get_the_time', 'wpp_fix_post_date', 10, 2);
		    remove_filter('get_the_date', 'wpp_fix_post_date', 10, 2);
		    remove_filter('get_comment_time', 'wpp_fix_comment_time', 10, 2);
		    remove_filter('get_comment_date', 'wpp_fix_comment_date', 10, 2);
		    //add_filter('get_post_modified_time', 'wpp_fix_post_modified_time', 10, 3);
		    remove_filter('date_i18n', 'wpp_fix_i18n', 10, 4);
		    remove_filter('wp_date', 'wpp_fix_i18n', 10, 4);
	}else{
		function general_admin_notice(){
         		echo '<div class="notice notice-error is-dismissible">
             		<p> افزونه پارسی دیت نصب /فعال نشده، و به جهت اعمال خودکار تاریخ شمسی و میلادی در زبان فارسی و غیر فارسی لازم است افزونه Parsidate و Translatepress نصب و فعال شوند </p>
         		</div>';		
			}
		add_action('admin_notices', 'general_admin_notice');
	}
}
