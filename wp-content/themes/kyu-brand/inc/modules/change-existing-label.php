<?php
/**
 * 
   MENU	                KEY	        URL
 * Dashboard	          2	          index.php
 * Home	                0	          index.php
 * Separator (first)	  4	          separator1
 * Posts	              5	          edit.php
 * All Posts	          5	          edit.php
 * - Add New	          10	        post-new.php
 * – Categories	        15	        edit-tags.php?taxonomy=category
 * – Tags	              16	        edit-tags.php?taxonomy=post_tag
 * Media	              10	        upload.php
 * – Library	          5	          upload.php
 * – Add New	          10	        media-new
 * Links	              15	        link-manager.php
 * – All Links	        5	          link-manager.php
 * – Add New	          10      	  link-add.php
 * – Link Categories	  15	        edit-tags.php?taxonomy=link_category
 * Pages	              20	        edit.php?post_type=page
 * – All Pages	        5	          edit.php?post_type=page
 * – Add New	          10	        post-new.php?post_type=page
 * Comments	            25	        edit-comments.php
 * – All Comments	      0	          edit-comments.php
 * Separator (Second)	  59	        separator2
 * Appearance	          60	        themes.php
 * – Themes	            5	          themes.php
 * – Widgets	          7	          widgets.php
 * – Menus	            10	        nav-menus.php
 * Plugins	            65	        plugins.php
 * – Installed Plugins	5	          plugins.php
 * – Add New	          10	        plugin-install.php
 * – Editor	            15	        plugin-editor.php
 * Users	              70	        users.php
 * – All Users	        5	          users.php
 * – Add New	          10      	  user-new.php
 * – Your Profile   	  15      	  profile.php
 * Tools	              75      	  tools.php
 * – Available Tools	  5	          tools.php
 * – Import	            10      	  import.php
 * – Exports        	  15      	  export.php
 * Settings	            80      	  options-general.php
 * – General    	      10	        options-general.php
 * – Writing	          15      	  options-writing.php
 * – Reading	          20	        options-reading.php
 * – Discussion	        25      	  options-discussion.php
 * – Media	            30	        options-media.php
 * – Privacy	          35	        options-privacy.php
 * – Permalinks	        40	        options-permalink.php
 * Separator (last)	    99	        separator-last
 * WooCommerce          55.5        admin.php?page=wc-admin
 * Portfolio            6           edit.php?post_type=featured_item
 */
/** ==================================================================== */

/** Đổi tên label của Sub menu admin */
function kukun_sub_admin_menu_rename() {
     global $menu; 
     global $submenu; 
     $menu[5][0] = 'Tin Tức Việc Làm';                          // Post => Tin Tức
     $submenu['edit.php'][5][0] = 'Tất Cả Tin Tức';    // Tất cả Bài Viết => tất cả Tin Tức
}
add_action( 'admin_menu', 'kukun_sub_admin_menu_rename' );