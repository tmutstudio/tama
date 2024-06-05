<?php

/**
 * Collapse ADMIN-BAR (Toolbar) into left-top corner.
 *
 * @version 1.0
 */
final class Geo_Collapse_Toolbar {

	public static function init(){
		add_action( 'admin_bar_init', [ __CLASS__, 'hooks' ] );
	}

	public static function hooks(){

		// remove html margin bumps
		remove_action( 'wp_head', '_admin_bar_bump_cb' );

		add_action( 'wp_head', [ __CLASS__, 'collapse_styles' ] );
	}

	public static function collapse_styles(){

		// do nothing for admin-panel.
		// Remove this if you want to collapse admin-bar in admin-panel too.
		if( is_admin() ){
			return;
		}

		ob_start();
		?>
		<style id="geo_collapse_admin_bar">
			#wpadminbar{ background:none; float:left; width:auto; height:auto; bottom:0; min-width:0 !important; }
			#wpadminbar > *{ float:left !important; clear:both !important; }
			#wpadminbar .ab-top-menu li{ float:none !important; }
			#wpadminbar .ab-top-secondary{ float: none !important; }
			#wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper{ top:0; left:100%; white-space:nowrap; }
			#wpadminbar .quicklinks>ul>li>a{ padding-right:17px; }
			#wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper{ left:100%; right:auto; }
			html{ margin-top:0!important; }

			#wpadminbar{ overflow:hidden; width:33px; height:30px; }
			#wpadminbar:hover{ overflow:visible; width:auto; height:auto; background:rgba(102,102,102,.7); }

			/* the color of the main icon */
			#wp-admin-bar-<?= is_multisite() ? 'my-sites' : 'site-name' ?> .ab-item:before{ color:#797c7d; }

			/* hide wp-logo */
			#wp-admin-bar-wp-logo{ display:none; }
			/* #wp-admin-bar-search{ display:none; } */

			/* edit for twentysixteen */
			body.admin-bar:before{ display:none; }

			/* for almin panel --- */
			@media screen and ( min-width: 782px ) {
				html.wp-toolbar{ padding-top:0 !important; }
				#wpadminbar:hover{ background:rgba(102,102,102,1); }
				#adminmenu{ margin-top:48px !important; }
			}

			/* Gutenberg */
			#wpwrap .edit-post-header{ top:0; }
			#wpwrap .edit-post-sidebar{ top:56px; }
		</style>
		<?php
		$styles = ob_get_clean();

		echo preg_replace( '/[\n\t]/', '', $styles ) ."\n";
	}
}

Geo_Collapse_Toolbar::init();