<?php
/**
 * @package WordPress
 * @subpackage YIW Themes
 * 
 * Here the first hentry of theme, when all theme will be loaded.
 * On new update of theme, you can not replace this file.
 * You will write here all your custom functions, they remain after upgrade.
 * 5July2013-ecovaran - changed post_per_page count to 45 - to show a max of 45 products per page without pagination
 */                                                                               

// include all framework
require_once dirname(__FILE__) . '/core/core.php';

// include the library for the layers slider
require_once dirname(__FILE__) . '/inc/LayerSlider/layerslider.php';

/*-----------------------------------------------------------------------------------*/
/* End Theme Load Functions - You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );
/**
 * Replace WooCommerce Default Pagination with WP-PageNavi Pagination
 *
 * @author WPSnacks.com
 * @link http://www.wpsnacks.com
 */
remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
/*function woocommerce_pagination() {
		wp_pagenavi(); 		
	}*/
/*add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);*/

 //Will effect both the woocommerce archive page and the wordpress archive page
function set_row_count_archive($query){
    if ($query->is_archive) {
            $query->set('posts_per_page', 45);
   }
    return $query;
}

add_filter('pre_get_posts', 'set_row_count_archive');
?>
