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
	function __construct () {
		add_action( 'init', array( $this,'custom_post_type' ) );
	}
    function activate() {
        // generate a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        // flush rewrite rules
    }

    function custom_post_type() {
    	register_post_type( 'book', ['public' => true, 'label' => 'Journal Entry'] );
    }
  
    function enqueue() {
    	// enqueue all our scripts
    	wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__) );
    }
}

if ( class_exists('JournalMaker')) {
    $boringJokes = new JournalMaker();	
}

// activation
register_activation_hook( __FILE__, array( $boringJokes, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, array( $boringJokes, 'deactivate') );
