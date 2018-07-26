<?php

/**
 * @copyright (C) Copyright Bobbing Wide 2018
 * @package oik-bob-bing-wide
 */
 
function bw_archive( $atts=null, $content=null, $tag=null) {

	$atts['echo'] = false;
	$atts['format'] = bw_array_get( $atts, 'format', 'html' );
	$atts['show_post_count'] = bw_array_get( $atts, 'show_post_count', true );
	$archives = wp_get_archives( $atts );
	
	return $archives;
	
}

function bw_archive__syntax( $shortcode ) {
	$syntax = array( "type" => bw_skv( "monthly", "daily|weekly|yearly|postbypost|alpha", "Type of archive to retrieve" )
								);
	return $syntax;
}

 
