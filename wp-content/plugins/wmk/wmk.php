<?php

/*
Plugin Name:Wmk
Plugin URI:https://www.google.com/
Author:Nishant Dua
Author URI:https://www.google.com/
Version:1.1
Description:This plugin is created just for tstin purpose.
*/

add_action('admin_menu','myfirstplugin');
function myfirstplugin()
{
   add_menu_page('websitemakerking','wmk','administrator','wmk_slug','wmk_func','dashicons-admin-tools','99');
}

function wmk_func()
{
	echo "thanks";
}


