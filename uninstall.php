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
$books = get_posts( arry( 'post_type' => 'books', 'numberposts' => -1) );

foreach( $books as $book) {
	wp_delete_posts( $book->ID, true );
}