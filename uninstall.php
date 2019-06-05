<?php

/**
 * Trigger this file on Plugin unistall 
 *
 * @package BoringJokes
 */

if( ! defined( 'WP_UNINSTALL_PLUGIN')){
	die;
}

// Clear Database stored data
$jounrals = get_posts( arry( 'post_type' => 'jounrals', 'numberposts' => -1) );

foreach( $jounrals as $journal ) {
	wp_delete_posts( $journal->ID, true );
}