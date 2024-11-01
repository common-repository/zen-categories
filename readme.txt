=== zencart categories in wordpress ===
Contributors: madabtwp
Donate link: 
Tags: categories,subcategories,zencart,widget,wordpress,display
Requires at least:PHP5
Tested up to: 3.2.1
Stable tag: 1.0

This widget plugin is useful in reducing effort for displaying Zen Cart’s database tables and displays your Zen Cart categories in the WordPress sidebar.

== Description ==

This is a sidebar widget which is useful in displaying the zencart categories and subcategories in wordpress.just drag and drop the widget in the sidebar it will display all the zencart categories.

For using this plugin user need to make 2 changes 

1. change the table prefix in the zen_categories.php to the prefix of their own categories and categoriesdescription tables

2. specify the zencart folder name in $shop variable for me it is store so i have put that user needs to change that according to his folder name in  zen_categories.php

For Ex: Now I have used the prefix as zen_ which is commonly used. if you are using another one please change the prefix by opening the zen_categories.php
			ie change the zen_  in			

	$table1 = "zen_categories";
	$table2 = "zen_categories_description";

also change "store" according to your zencart folder  
        
	$shop="store";


**Features**

displays the categories and subcategories from zencart in an easy manner

== Installation ==


Installation with widget:

1. Upload the zen-categories folder to your wp-content/plugins/ folder.
2. Activate the plugin and widget from the "plugins" page.


== Frequently Asked Questions ==

== Screenshots ==

