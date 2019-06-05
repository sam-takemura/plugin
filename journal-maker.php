<?php
/**
 * @package JournalMaker
 */
/*
Plugin Name: JournalMaker
Plugin URI: 
Description: This is my first attempt on writing a custom plugin for Wordpress.
Version: 1.0.0
Author: Masahito Takemura
Author URI: https://www.linkedin.com/in/mtakemura/
License: GPLv3 or later
Text Domain: First Plugin
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

defined( 'ABSPATH' ) or die( 'Knock, knock. Whose there? Oops wrong door! No jokes here...' );

class JournalMaker
{
    public $plugin;

    function __construct() {
        $this->plugin =  plugin_basename( __FILE__ );

        add_action( 'init', array( $this,'custom_post_type' ) );
    }

    function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue') );

        add_action( 'admin_menu', array( $this, 'add_admin_pages') );

        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link') );
    }

    function settings_link( $links ) {
        $settings_link = '<a href="admin.php?page=journal_maker">Settings</a>';
        array_push( $links, $settings_link );
        return $links;
    }

    function add_admin_pages() {
        add_menu_page( 'JournalMaker', 'Journal', 'manage_options', 'journal_maker', array( $this, 'admin_index' ), 'dashicons-clipboard', 110 );
    }

    function admin_index() {
        require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
    }

    function custom_post_type() {
    	register_post_type( 'journal', ['public' => true, 'label' => 'Journal Entry'] );
    }
  
    function enqueue() {
    	// enqueue all our scripts
    	wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__) );
        wp_enqueue_script( 'mypluginsscript', plugins_url( '/assets/myscript.js', __FILE__) );
    }

    function activate(){
        require_once plugin_dir_path(__FILE__) . 'inc/journal-maker-activate.php';
        JournalMakerActivate::activate();
    }
}

if ( class_exists('JournalMaker')) {
    $journalMaker = new JournalMaker();
    $journalMaker->register();	
}


// activation
register_activation_hook( __FILE__, array( $journalMaker, 'activate') );

// deactivation
require_once plugin_dir_path(__FILE__) . 'inc/journal-maker-deactivate.php';
register_deactivation_hook( __FILE__, array( 'JournalMakerDeactivate', 'deactivate') );
