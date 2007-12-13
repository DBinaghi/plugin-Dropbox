<?php 

define('DROPBOX_PLUGIN_VERSION', 0.1);

add_plugin_hook('initialize', 'dropbox_initialize');

add_plugin_hook('add_routes', 'dropbox_routes');

function dropbox_initialize()
{
	add_controllers('controllers');
	add_theme_pages('theme', 'admin');
	add_navigation('Batch Add', 'dropbox', 'archive', array('Entities','add'));
}

function dropbox_routes($router)
{
	$router->addRoute('dropbox', new Zend_Controller_Router_Route('dropbox/', array('controller'=>'index', 'action'=>'index', 'module'=>'dropbox')));
	
	$router->addRoute('dropbox_actions', new Zend_Controller_Router_Route('dropbox/:action', array('controller'=>'index', 'module'=>'dropbox', 'action'=>'index')));

}

add_plugin_hook('install', 'dropbox_install');

function dropbox_install()
{	
		
		set_option('dropbox_plugin_version', DROPBOX_PLUGIN_VERSION);

}

/*  uncomment after fixing saveFiles() in Item model to handle moving these files

add_plugin_hook('append_to_item_form_upload', 'dropbox_list');

function dropbox_list()
{
	include 'theme/dropbox/dropboxlist.php';
}  */

?>