<?php
/*
Plugin Name: zen_cat
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: adds categories from zencart to wordpress
Version: 1.0
Author: christy a george
Author URI: http://URI_Of_The_Plugin_Author
*/
?>
<?php
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?
function zencat_widget() {
		global $wpdb;
		$site=get_site_url(); 
		/* change these  variables according to your website*/
$table1 = "zen_categories";
$table2 = "zen_categories_description";
$shop="store";
     /* make hanges and enjoy using this plugin good luck*/
$sql = "SELECT * FROM $table2 join $table1 using(categories_id) WHERE parent_id=0 AND categories_status=1 ORDER BY sort_order";
$top_level =$wpdb->get_results($sql); 
$numrows1 = $wpdb->num_rows;
 $upload_dir = wp_upload_dir();

			$content = "";
					
			for($i=0;$i<$numrows1;$i++) {
			$sql = "SELECT * FROM $table2 join $table1 using(categories_id) WHERE parent_id=" . $top_level[$i]->categories_id . " AND categories_status=1 ORDER BY sort_order";
			
			$children = $wpdb->get_results($sql);
			$numrows2 = $wpdb->num_rows;
			if($cid==$top_level[$i]->categories_id) {
			}
			$top_level_link = ''.$site.'/'.$shop.'/index.php?main_page=index&cPath='. $top_level[$i]->categories_id;
			//$top_level_link = zen_href_link(FILENAME_DEFAULT, 'cPath=' . $top_level->categories_id . '');
			$top_level_name = $top_level[$i]->categories_name;
			if ($numrows2 > 0) {
			$content .= "<li><a href=".$top_level_link.">$top_level_name</a><ul>";
			for($j=0;$j<$numrows2;$j++) {
				$child_link =''.$site.'/'.$shop.'/index.php?main_page=index&cPath='. $top_level[$i]->categories_id.'_' . $children[$j]->categories_id;
			//$child_link = zen_href_link(FILENAME_DEFAULT, 'cPath='. $top_level->fields['categories_id'].'_' . $children->fields['categories_id'] . '');
			$child_name = $children[$j]->categories_name;
			$content .= "<li><a href=".$child_link.">$child_name</a></li>";
			//$children->MoveNext();
			}
			$content .= "</ul>";
			} else {
			$content .= "<li><a href=".$top_level_link.">$top_level_name</a></li>";
			}
			//$top_level->MoveNext();
			}    
			echo $content;
										
  					
					
		}
 
function init_zencat(){
	register_sidebar_widget("zen_cat", "zencat_widget");     
}
 
add_action("plugins_loaded", "init_zencat");
?>
		